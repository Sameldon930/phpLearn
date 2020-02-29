<?php
/**
 * swoole 使用redis的前置条件
 * 1.redis服务
 * 2.hiredis库
 * 3.变异swoole需要加入 -enable-async-redis
 */

/**
 * 异步redis
 */
$redisClient = new swoole_redis;
//如果连接成功 会返回 bool
$redisClient->connect(
    '127.0.0.1',
    6379,
    function (swoole_redis $redisClient, $result) {
        echo "connect" . PHP_EOL;

        //set  $result 作为回调结果
//        $redisClient->set(
//            "zhangzeshan",
//            time(),
//            function (swoole_redis $redisClient, $result) {
//                var_dump($result);
//            }
//        );

        //get  $result 作为回调结果
//        $redisClient->get(
//            "zhangzeshan",
//            function (swoole_redis $redisClient, $result) {
//                var_dump($result);
//                //关闭连接
//                $redisClient->close();
//            }
//        );

        //获取所有key  $result 作为回调结果
        $redisClient->keys("*",function (swoole_redis $redisClient,$result){
            var_dump($result);
        });
    }
);
echo "start" . PHP_EOL;