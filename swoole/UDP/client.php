<?php
/**
 * 创建--同步--客户端
 *
 */


//创建对象
$client = new Swoole\Client(SWOOLE_SOCK_UDP);//创建tcp socket(默认ipv4)  同步客户端

//客户端发送数据
$client->sendto('172.16.22.157',9502,'我是张泽山');

//接收返回信息  从服务器端接收数据
$response = $client->recv();
echo $response.PHP_EOL;
