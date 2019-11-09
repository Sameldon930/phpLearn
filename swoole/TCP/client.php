<?php
/**
 * 创建--同步--客户端
 * 需要等待服务端处理完 才能接收到数据
 */
//socket_create();  原生
//SWOOLE_SOCK_TCP 创建tcp socket
//SWOOLE_SOCK_TCP6 创建tcp ipv6 socket
//SWOOLE_SOCK_UDP 创建udp socket
//SWOOLE_SOCK_UDP6 创建udp ipv6 socket
//SWOOLE_SOCK_UNIX_DGRAM 创建unix dgram socket
//SWOOLE_SOCK_UNIX_STREAM 创建unix stream socket
//SWOOLE_SOCK_SYNC 同步客户端
//SWOOLE_SOCK_ASYNC 异步客户端

//创建对象
$client = new Swoole\Client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_SYNC);//创建tcp socket(默认ipv4)  同步客户端

//连接内网
/**
 * 参数1 地址  参数2 端口  参数3 连接时间
 */
if($client->connect('172.16.22.157',9501,5000)){//如果连接成功
    //客户端发送数据
    $client->send('我是张泽山');
};

//接收返回信息  从服务器端接收数据
$response = $client->recv();
echo $response.PHP_EOL;

//关闭客户端
$client->close();
