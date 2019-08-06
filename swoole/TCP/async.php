<?php
/**
 * 创建异步客户端
 * 当服务端不能在相应的时间内 返回数据内容
 * 使用异步 就可以接收信息 不需要等待服务端
 */

$client = new Swoole\Client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_ASYNC);

//绑定连接事件  绑定之后 才能连接
$client->on('connect',function($client){
    $client->send("我是异步客户端！");
});
//绑定接收事件
$client->on('receive',function ($client,$data){
    echo "接收消息".$data.PHP_EOL;
});
//绑定错误事件
$client->on('error',function ($client){

});
//绑定关闭事件
$client->on('close',function($client){

});
//连接
$client->connect('172.16.22.157',9501,5000) || exit('连接失败！错误代码：'.$client->errCode);


