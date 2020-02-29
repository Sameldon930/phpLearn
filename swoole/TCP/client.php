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
if(!$client->connect('127.0.0.1',9501)){//如果连接失败
    echo "fail";
    exit;
};

//在命令行输入信息
fwrite(STDOUT,"请输入消息：");
$msg = trim(fgets(STDIN));
//将命令行输入的消息 推送给服务端
$client->send($msg);

//接收服务端推送给我们的数据
$response = $client->recv();
echo $response.PHP_EOL;

//关闭客户端
$client->close();
