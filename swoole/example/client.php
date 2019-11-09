<?php
/**
 * 创建客户端A
 */


//创建对象
$client = new Swoole\Client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_SYNC);//创建tcp socket(默认ipv4)  同步客户端

if($client->connect('172.16.22.157',9800,5000)){//如果连接成功
    //客户端发送数据
    $client->send('连接服务器A');
};

//接收返回信息  从服务器端接收数据
$response = $client->recv();
echo $response.PHP_EOL;

//关闭客户端
$client->close();
