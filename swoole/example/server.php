<?php
/**
 * 创建服务端A
 */

//构建Server对象   内网
$server = new Swoole\Server('172.16.22.157',9800);

//设置运行时参数
$server->set(array(
//    'daemonize' => true,//后台运行
));


/**
 * //注册事件回调函数  -----事件驱动--连接--onConnect
 * $server是服务端的对象
 * $fd是连接的文件描述符 发送数据和关闭连接时需要此参数
 */
$server->on('connect',function ($server,$fd){
    echo '有新的客户端连接，连接标识为--------'.$fd.PHP_EOL;
});

/**
 * //-----事件驱动--接收--onReceive
 * $reactor_id是来自于哪个reactor线程
 * $data，收到的数据内容，可能是文本或者二进制内容
 */
$server->on('receive',function ($server,$fd,$reactor_id,$data){
    //往服务端B发送信息
    $client = new Swoole\Client(SWOOLE_SOCK_TCP,SWOOLE_SOCK_SYNC);//创建tcp socket(默认ipv4)  同步客户端
    if($client->connect('172.16.22.157',9801,5000)){//如果连接成功
        //客户端发送数据
        $client->send('连接服务器B,获取数据');
    };
    //接收返回信息  从服务器端接收数据
    $response = $client->recv();
    echo $response.PHP_EOL;
    $client->close();
    $server->send($fd,'服务端A返回的消息为'.$response);
});

/**
 * //-----事件驱动--关闭--onReceive
 * $server是服务端的对象
 * $fd是连接的文件描述符 发送数据和关闭连接时需要此参数
 */
$server->on('close',function ($server,$fd){
    echo '客户端关闭-------------'.$fd.PHP_EOL;
});

//启动服务器
$server->start();


