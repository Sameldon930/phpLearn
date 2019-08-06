<?php
/**
 * 创建 UDP服务端
 */
//构建Server对象   内网
$server = new Swoole\Server('172.16.22.157',9502,SWOOLE_PROCESS,SWOOLE_SOCK_UDP);

//设置运行时参数
$server->set(array(
//    'daemonize' => true,//后台运行
));
/**
 * UDP数据包时回调此函数
 * $server，Server对象
 * $data，收到的数据内容，可能是文本或者二进制内容
 * $client_info，客户端信息包括address/port/server_socket等多项客户端信息数据
 */
$server->on('packet',function ($server,$data,$client_info){
    echo '接收客户端信息---------'.$data.PHP_EOL;
    //接收之后 返回信息  客户端ip 客户端端口 发给客户端的内容
    $server->sendto($client_info['address'],$client_info['port'],'UDP数据接收成功');
});


//启动服务器
$server->start();