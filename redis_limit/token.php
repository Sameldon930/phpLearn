<?php
//  1.令牌桶算法
//  2.redis队列
//  3.服务部署
//  4.效果演示
/**
 * Class Token
 * 使用的容器是redis  令牌存放到redis的list链表中
 * 配额
 * 两个方法  投递令牌  获取令牌
 */
class Token {
    private $_max;//最大配额
    private $_redis;//令牌桶
    private $_queue;//令牌桶名称

    public function __construct($config=[]){
        $this->_redis = new Redis();
        $this->_redis->connect('127.0.0.1',6379);
        $this->_queue = 'token';//令牌桶名称
        $this->_max = 3;//配额默认100
        $this->add();
    }

    /**
     * 投递令牌(添加)
     *
     */
    public  function  add($num = 1){
        /**
         * 令牌桶算法
         *
         */
        //获取桶内的剩余令牌
        $currentNum = $this->_redis->lSize($this->_queue);
        //最大令牌数
        $maxNum = $this->_max;
        //最多能添加多少令牌 不能超过最大
        //  如果最大值大于当前剩余加上要添加的数量 那就是传 要添加的数量 否则就是 最大值减去剩余的数量
        $num = $maxNum>=$currentNum+$num?$num:$maxNum-$currentNum;


        //根据次数  循环插入令牌
        for($i=1;$i<=$num;$i++){
            $this->_redis->lPush($this->_queue,$i);//链表添加元素  也就是插入令牌
        }
    }
    /**
     * 获取令牌
     */
    public function get(){
        return $this->_redis->rPop($this->_queue)?true:false;

    }
    /**
     * 初始化方法
     */
    public  function  reset(){
        //删除原有的数据
        $this->_redis->del($this->_queue);
        return $this->add($this->_max);//添加多少配额

    }
}



