<?php

/**
 * 第二个参数设置为true 输出内容将不是打印屏幕，而是写入到主进程管道  管道理解成 进程之间的桥梁
 * false则会输出到命令行上
 * 此时 该文件为 父进程
 */

//创建子进程
$process = new swoole_process(
    function (swoole_process $pro) {
        //此时的输出不会显示出来  因为开启重定向子进程的标准输入和输出
//    echo 1;
        //父进程执行某些操作 比如 执行开启某个服务 这里开启http服务为例子
        $pro->exec("/www/server/php/72/bin/php", [__DIR__ . '/../Http/http_server.php']);
    }, true
);

//启动子进程
$pid = $process->start();
//获取子进程的id  此时进程的pid 对应 netstat -anp|grep 9503 产生的id
echo $pid . PHP_EOL;

/**
 * 结束的时候 回收子进程
 */
swoole_process::wait();