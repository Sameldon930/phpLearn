<?php
// php模拟http请求

/**
 * curl扩展库的使用
 * 首先在php.ini开启扩展
 * curl_init() 建立连接 激活curl的连接功能
 * curl_setOpt() 设置选项 
 * curl_exec 执行与服务器的连接
 * curl_close 关闭资源
 */

 /**
  * curl_setOpt
  * 
  * curlopt_url:连接对象
  * curlopt_returntransfer:将服务器执行的结果以文件流的形式返回到请求界面
  * curlopt_post:是否才有post方式发起的请求 默认是get
  * curlopt_postfields:用来传递post提交的数据 分为两种 字符串(name=12&age=123) 以及数组形式 array(''=>'',''=>'')
  * curlopt_header: 是否得到响应的header信息 默认不获取
  */

//开启会话
header('Content-type:text/html;charset=utf-8');
$ch = curl_init();

//设置选项
curl_setopt($ch,CURLOPT_URL,'localhost/phpLearn/uploads/one_upload.html');//设置url
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//返回数据
curl_setopt($ch,CURLOPT_HEADER,0);//是否获取响应头的信息  0否 1是


//如果要使用post
curl_setopt($ch,CURLOPT_POST,TRUE);//使用POST
curl_setopt($ch,CURlOPT_POSTFIELDS,array());//post提交的数据 存在数组里面



//执行连接
 $content = curl_exec($ch);//
//关闭连接
curl_close($ch);




<?php

namespace app\index\auto;

use app\index\model\AllDeal;
use app\index\model\ConditionSet;
use app\index\model\Contract;
use app\index\model\UserAccount;
use app\index\controller\ContractClose;
use app\index\controller\ContractOpen;
use think\Controller;
use think\Db;
use think\Request;
use think\log;

class AutoDeal extends Controller
{
    private $Contract;
    private $AllDeal;
    private $UserAccount;
    private $ConditionSet;
    private $ContractOpen;
    private $ContractClose;

    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->Contract = new Contract();
        $this->AllDeal = new AllDeal();
        $this->UserAccount = new UserAccount();
        $this->ConditionSet = new ConditionSet();
        $this->ContractOpen = new ContractOpen();
        $this->ContractClose = new ContractClose();
    }

    /**
     * 计划任务
     * @param $user_config array 基础信息
     * @return int
     */
    public function index($user_config)
    {
        Log::info('自动交易开始');
        $close_ratio = $user_config['profit_close_number'];
        $this->find_condition(); //查找符合要求的条件单
        $prices = $this->query_prices();
        $res1 = $prices ? $this->force_close_user($close_ratio, $prices) : $prices;//盈亏平仓
        $res2 = $prices ? $this->delivery_close($prices) : $prices; //合约交割结算
        Log::info('自动交易结束');
        return $res1 && $res2;
    }

    /**
     * 查找应该强制平仓的用户
     * @param $close_rate float 基础信息
     * @param $prices array 最新价信息
     * @return int
     */
    private function force_close_user($close_rate, $prices)
    {
        $all_deals = $this->AllDeal->relation(array('futures', 'parities'))->where(array('total' => ['>', 0]))->select();
        return $this->close_handle($all_deals, $prices, $close_rate);
    }

    /**
     * 查询全部持仓价格信息
     * @return array
     */
    private function query_prices()
    {
        $all_deals = Db::name('all_deal')->where(array('total' => ['>', 0]))->select();
        return $all_deals ? price_stocks($all_deals) : array();
    }

    /**
     * 平仓信息
     * @param $current_price float 当前价格
     * @param $number int 平仓数量
     * @param $depot array 持仓信息
     * @param $close_type int 平仓类型
     * @param $type int 止盈止损类
     * @return array
     */
    private function close_index($current_price, $number, $depot, $close_type, $type)
    {
        $stock_type = $depot['futures']['stock_type'];
        if ($current_price && trading_hours($stock_type)) {
            $data['contract'] = array('short' => $depot['short'], 'type' => $depot['stock_type'], 'code' => $depot['code'], 'name' => $depot['name']);
            $data['variety'] = $depot['futures'];
            $data['parities'] = $depot['parities']['ratio'];
            $data['current_price'] = $current_price;
            return $this->ContractClose->index_data($depot['uid'], $data, $number, $depot, $close_type, $type);
        } else {
            return msg_handle('平仓失败', 0);
        }
    }

    /**
     * 查询单人全部持仓
     * @param $id int 用户id
     * @return false|\PDOStatement|string|\think\Collection
     */
    private function query_all_deal($id)
    {
        $map['uid'] = $id;
        $map['total'] = ['>', 0];
        return $this->AllDeal->relation(array('futures', 'parities'))->where($map)->select();
    }

    /**
     * 止盈止损+强制强平
     * @param $list mixed 持仓信息
     * @param $prices array 价格信息
     * @param $close_rate float 平仓比例
     * @return int
     */
    private function close_handle($list, $prices, $close_rate)
    {
        $is_close = 0;
        foreach ($list as $key => $value) {
            $current_price = stocks_data($prices, $value['short']);
            $futures = $value['futures'];//品种信息
            $direction = $value['direction'];//开仓方向
            $number = $value['number'];//剩余数量
            $is_close = $this->prohibit_overnight($current_price, $value, $futures);
            $is_close = $is_close == 0 ? $this->lose_close($value, $direction, $current_price, $number, $value['lose_number'], $value['lose_close']) : $is_close;
            $is_close = $is_close == 0 ? $this->profit_close($value, $direction, $current_price, $number, $value['profit_number'], $value['profit_close']) : $is_close;
            $is_close = $is_close == 0 ? $this->account_thaw($value['uid'], $value, $futures) : $is_close;
            $is_close = $is_close == 0 ? $this->account_frozen($value['uid'], $current_price, $value, $futures) : $is_close;
            $is_close = $is_close == 0 ? $this->calculation_risk($value['uid'], $value, $current_price, $close_rate, $prices) : $is_close;
        }
        return $is_close;
    }


    /**
     * 计算盈亏平仓
     * @param $id int 用户id
     * @param $depot array 持仓信息
     * @param $current_price float 当前价格
     * @param $close_rate float 平仓比例
     * @param $prices array 价格信息
     */
    private function calculation_risk($id, $depot, $current_price, $close_rate, $prices)
    {
        $account = $this->UserAccount->where(array('uid' => $id))->find();
        $account_money = $account['account'] + $account['bond'] + $account['bond_total'];
        $risk_rate = $account['bond'] * ($close_rate / 100);//风控线
        $profit_loss = $this->profit_loss($this->query_all_deal($id), $prices);//当前盈亏
        $user_account = $account_money + $profit_loss - $risk_rate;//平仓线
        if ($user_account < 0) {
            $this->close_index($current_price, $depot['number'], $depot, 14, 0);
        } else {
            $map_acc['uid'] = $account['uid'];
            $map_acc['dynamic_profit'] = $profit_loss;
            $map_acc['time'] = time();
            $this->UserAccount->update($map_acc);
        }
    }

    /**
     * 收盘解冻资金
     * @param $id int 用户id
     * @param $current_price float 价格
     * @param $depot array 持仓信息
     * @param $futures array 品种信息
     */
    private function account_frozen($id, $current_price, $depot, $futures)
    {
        $bond = $depot['bond'];
        if ($this->close_time_data($futures)) {
            $ratio = $this->bond_ratio_handle($futures);
            $money = $bond * $ratio;
            $frozen_bond = floatval($depot['frozen_bond']);
            if ($money && empty($frozen_bond)) {
                $account = $this->UserAccount->where(array('uid' => $id))->find();
                $money = $money / $account['multiple'];
                if ($account['account'] < $money) {
                    $this->close_index($current_price, $depot['number'], $depot, 19, 0);
                } else {
                    $this->UserAccount->startTrans();
                    $res1 = $this->user_account_plus($account, $money);
                    $res2 = $this->AllDeal->where(array('id' => $depot['id']))->update(array('frozen_bond' => $money));
                    if ($res1 && $res2) {
                        $this->UserAccount->commit();
                    } else {
                        $this->UserAccount->rollback();
                    }
                }
            }
        }
    }

    /**
     * 开盘解冻资金
     * @param $id int 用户id
     * @param $depot array 持仓信息
     * @param $futures array 品种信息
     */
    private function account_thaw($id, $depot, $futures)
    {
        if ($this->open_time_data($futures)) {
            $money = floatval($depot['frozen_bond']);
            if ($money) {
                $account = $this->UserAccount->where(array('uid' => $id))->find();
                $this->UserAccount->startTrans();
                $res1 = $this->user_account_minus($account, $money);
                $res2 = $this->AllDeal->where(array('id' => $depot['id']))->update(array('frozen_bond' => 0));
                if ($res1 && $res2) {
                    $this->UserAccount->commit();
                } else {
                    $this->UserAccount->rollback();
                }
            }
        }
    }

    /**
     * 保证金处理
     * @param $futures array 品种信息
     * @return int
     */
    private function bond_ratio_handle($futures)
    {
        $ratio = $futures['multiple'];
        return $ratio;
    }


    /**
     * 冻结资金
     * @param $account array 账户信息
     * @param $money float 冻结金额
     * @return int|string
     */
    private function user_account_plus($account, $money)
    {
        $map['uid'] = $account['uid'];
        $map['account'] = $account['account'] - $money;
        $map['total'] = $map['account'] * $account['multiple'];
        $map['bond_total'] = $account['bond_total'] + $money;
        $map['time'] = time();
        return $this->UserAccount->update($map);
    }

    /**
     * 解冻资金
     * @param $account array 账户信息
     * @param $money float 解冻金额
     * @return int|string
     */
    private function user_account_minus($account, $money)
    {
        $map['uid'] = $account['uid'];
        $map['account'] = $account['account'] + $money;
        $map['total'] = $map['account'] * $account['multiple'];
        $map['bond_total'] = $account['bond_total'] - $money;
        $map['time'] = time();
        return $this->UserAccount->update($map);
    }

    /**
     * 时间处理
     * @param $time string 时间信息
     * @return bool
     */
    private function time_handle($time)
    {
        $cur_time = strtotime($time);
        $start = $cur_time - 5 * 60;
        $end = $cur_time;
        return time_section($start, $end, time());
    }

    /**
     * 收盘时间判断
     * @param $futures array 品种信息
     * @return bool
     */
    private function close_time_data($futures)
    {
        if (date('w') != 1 && date('w') != 0) {
            $open = $this->time_handle($futures['close_time']);
        } else {
            $open = 0;
        }
        return $open;
    }

    /**
     * 开盘时间判断
     * @param $futures array 品种信息
     * @return bool
     */
    private function open_time_data($futures)
    {
        if (date('w') != 6 && date('w') != 0) {
            $open = $this->time_handle1($futures['open_time']);
        } else {
            $open = 0;
        }
        return $open;
    }

    /**
     * 时间处理1
     * @param $time string 时间信息
     * @return bool
     */
    private function time_handle1($time)
    {
        $cur_time = strtotime($time);
        $start = $cur_time;
        $end = $cur_time + 5 * 60;
        return time_section($start, $end, time());
    }

    /**
     * 止盈价平仓
     * @param $depot array 持仓信息
     * @param $direction float 方向
     * @param $current_price float 价格
     * @param $number int 持仓数量
     * @param $profit_number int 止盈数量
     * @param $profit_close float 止盈价格
     * @return int
     */
    private function profit_close($depot, $direction, $current_price, $number, $profit_number, $profit_close)
    {
        $is_close = 0;
        if ($profit_number > 0) {
            $number = $profit_number > $number ? $number : $profit_number;
            if ($direction == 1 && $profit_close >= $current_price) {//卖出止盈平仓
                $this->close_index($current_price, $number, $depot, 10, 2);
                $is_close = 1;
            } elseif ($direction != 1 && $profit_close <= $current_price) {//买入止盈平仓
                $this->close_index($current_price, $number, $depot, 10, 2);
                $is_close = 1;
            }
        }
        return $is_close;
    }

    /**
     * 止损价平仓
     * @param $depot array 持仓信息
     * @param $direction float 方向
     * @param $current_price float 价格
     * @param $number int 持仓数量
     * @param $lose_number int 止损数量
     * @param $lose_close float 止损价
     * @return int
     */
    private function lose_close($depot, $direction, $current_price, $number, $lose_number, $lose_close)
    {
        $is_close = 0;
        if ($lose_number > 0) {
            $number = $lose_number > $number ? $number : $lose_number;
            if ($direction == 1 && $lose_close <= $current_price) {//卖出止损平仓
                $this->close_index($current_price, $number, $depot, 9, 1);
                $is_close = 1;
            } elseif ($direction != 1 && $lose_close >= $current_price) {//买入止损平
                $this->close_index($current_price, $number, $depot, 9, 1);
                $is_close = 1;
            }
        }
        return $is_close;
    }

    /**
     * 禁止隔夜
     * @param $current_price float 当前价格
     * @param $depot array 持仓信息
     * @param $futures array 品种信息
     * @return int
     */
    private function prohibit_overnight($current_price, $depot, $futures)
    {
        $is_close = 0;
        if ($depot['trade_type'] == 0) {
            if ($futures['constraint_time_one']) {
                $start = strtotime($futures['constraint_time_one']);
                $end = $start + 5 * 60;
            } elseif ($futures['constraint_time_two']) {
                $start = strtotime($futures['constraint_time_two']);
                $end = $start + 5 * 60;
            } else {
                $start = 0;
                $end = 0;
            }
            if (time_section($start, $end, time())) {
                $this->close_index($current_price, $depot['number'], $depot, 15, 0);
                $is_close = 1;
            }
        }
        return $is_close;
    }

    /**
     * 查询持仓盈亏
     * @param $list mixed 持仓信息
     * @param $prices mixed 基础信息
     * @return float|int
     */
    private function profit_loss($list, $prices)
    {
        $profit_loss = 0;
        foreach ($list as $key => $value) {
            $price = stocks_data($prices, $value['short']);
            if (empty($price)) {
                $price = $value['buy_price'];
            }
            $depot_price = $value['buy_price'];
            $direction = $value['direction'];
            $wave_spot = $value['trade_type'] == 1 ? 1 : $value['futures']['min_deal_parameter'];
            $wave_price = $value['trade_type'] == 1 ? 1 : $value['futures']['min_money'];
            $coefficient = $value['futures']['coefficient'];
            $day_profit_loss = profit_loss($wave_spot, $wave_price, $price, $depot_price, $value['number'], $direction,$coefficient);
            $day_profit_loss = $day_profit_loss * $value['parities']['ratio']; //换算盈亏
            $fee_total = $this->fee_total($value);
            $profit_loss += ($day_profit_loss - $fee_total); //换算盈亏
        }
        return $profit_loss;
    }

    /**
     * 查询手续费信息
     * @param $value array 持仓信息
     * @return float|int
     */
    private function fee_total($value)
    {
        $parities_ratio = $value['parities']['ratio'];
        $number = $value['number'];
        $futures = $value['futures'];
        $stock_fee = parities_ratio(($futures['open_fee'] / 2), $parities_ratio, $number);//平仓手续费
        return $stock_fee;
    }

    /**
     * 系统交割平仓
     * @param $prices array 价格信息
     */
    private function delivery_close($prices)
    {
        $contract = $this->Contract->where(array('is_trade' => 0, 'trading_time' => ['<', time()]))->select();
        $update_codes = array();
        foreach ($contract as $key => $value) {
            $trade_time = date('Y-m-d', $value['trading_time']) . ' ' . $value['trading_hour'];
            if (time() >= strtotime($trade_time)) {
                $this->trade_order($value['code'], $prices);//强制平仓
                array_push($update_codes, $this->update_trade_code($value));
            }
        }
        if ($update_codes) {
            $this->Contract->saveAll($update_codes);
        }
    }

    /**
     * 更新交割
     * @param $list array 合约信息
     * @return mixed
     */
    private function update_trade_code($list)
    {
        $map['id'] = $list['id'];
        $map['is_trade'] = 1;
        return $map;
    }

    /**
     * 交割强制平仓
     * @param $code string 合约代码
     * @param $prices array 价格信息
     */
    private function trade_order($code, $prices)
    {
        $map['code'] = $code;
        $map['number'] = ['>', 0];
        $list = $this->AllDeal->relation(array('futures', 'parities'))->where($map)->select();
        if (!$list->isEmpty()) {
            foreach ($list as $key => $value) {
                $current_price = stocks_data($prices, $value['short']);
                $this->close_index($current_price, $value['number'], $value, 12, 0);
            }
        }
    }

    /**
     * 查找符合要求的条件单
     */
    private function find_condition()
    {
        $list = $this->ConditionSet->relation(array('futures', 'parities'))->where(array('status' => 1))->select();
        $prices = price_stocks($list->toArray());
        foreach ($list as $key => $value) {
            $current_price = stocks_data($prices, $value['short']);
            if ($current_price && trading_hours($value['futures']['stock_type'])) {
                $res = 0;
                $continuous_price = floatval($value['continuous_price']);
                if ($value['continuous_choice'] == 1) {
                    if ($value['continuous_eq'] == 1 && $continuous_price <= $current_price) {
                        $res = 1;
                    }
                    if ($value['continuous_eq'] == 2 && $continuous_price == $current_price) {
                        $res = 2;
                    }
                    if ($value['continuous_eq'] == 3 && $continuous_price >= $current_price) {
                        $res = 3;
                    }
                } elseif ($value['continuous_choice'] == 2 && $value['continuous_time'] <= time()) {
                    $res = 4;
                }
                if ($res) {
                    $this->condition_data($current_price, $value);
                }
            } else {
                $this->ConditionSet->alone_log($value, 4);
            }
        }
    }

    /**
     * 条件单处理
     * 状态(1未触发   2成功   3失败  4 删除  )
     * @param $price string 价格信息
     * @param $list array 条件单合约
     * @return array
     */
    private function condition_data($price, $list)
    {
        $direction = $list['direction'];
        $number = $list['number'];
        $id = $list['uid'];
        $data['contract'] = array('short' => $list['short'], 'type' => $list['stock_type'], 'code' => $list['code'], 'name' => $list['name']);
        $data['variety'] = $list['futures'];
        $data['parities'] = $list['parities']['ratio'];
        $data['current_price'] = $price;
        if ($list['mold'] == 1) {
            $all_order = $this->AllDeal->depot_query($id, $list['code'], $direction);
            if ($all_order) {
                $close_type = $list['continuous_choice'] == 1 ? 11 : 12;
                $number = $number > $all_order['number'] ? $all_order['number'] : $number;
                $r = $this->ContractClose->index_data($id, $data, $number, $all_order, $close_type, 0);
            } else {
                $r = msg_handle('', 0);
            }
        } else {
            if ($list['stock_type'] == 0) {
                $trade_type = 1;
            } elseif ($list['stock_type'] == 1) {
                $trade_type = 1;
            } else {
                $trade_type = 0;
            }
            $r = $this->ContractOpen->index_data($id, $data, $trade_type, 0, $direction, 1, $list['continuous_price'], $number);
        }
        $status = $r['code'] == 1 ? 2 : 3;
        if ($this->ConditionSet->alone_log($list, $status)) {
            $res = msg_handle('发送成功', 1);
        } else {
            $res = msg_handle('发送失败', 0);
        }
        return $res;
    }
}


