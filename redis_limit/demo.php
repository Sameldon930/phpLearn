<?php
require_once 'token.php';

$token = new Token();

//初始化配额
$token->reset();

//获取令牌
for($i=1;$i<=6;$i++){//因为最大配额是3 这边循环6次 所以返回三次true 三次false
    //调用get方法 也就是获取令牌的方法
    $token->get();
}

//投递速度也绝对了访问速率
//var_dump($token->add(10));

//for($i=1;$i<=6;$i++){
//    if($token->get()){
//
//    }else{
//    }
//}
