<?php

/**
 *
 * 异步读取文件内容
 *
 *
 */


/**
 * 读取文件
 * $filename 文件名
 * $fileContent 文件内容
 * swoole_async_readfile(__DIR__."/read.txt",function($filename,$fileContent){    ---写法1
 */
$res = Swoole\Async::readfile(
    __DIR__ . "/read.txt",
    function ($filename, $fileContent) {
        echo "filename:" . $filename . PHP_EOL;
        echo "fileContent:" . $fileContent . PHP_EOL;
    }
);
// 执行代码的顺序是  var_dump echo  最后是函数内部的内容
var_dump($res);//n
echo "start" . PHP_EOL;
