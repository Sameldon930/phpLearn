<?php
/**
 * 通过同步的写法 实现异步的操作
 * 协程组件 redis
 */
$http = new swoole_http_server("0.0.0.0",9501);
$http->on('request',function ($request,$response){
    //获取redis的数据 输出到浏览器
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect("127.0.0.1",6379);
    //将请求连接的 get参数的值 获取redis中key对应的value
    $value = $redis->get($request->get['a']);
    //配置header头信息
    $response->header("Content-Type","text/plain");
    //获取之后 返回给客户端
    $response->end($value);
});
//开启服务
$http->start();

