<?php

/**
 * 
 * 异步写文件
 * 
 * 
 */

$content = date("Ymd H:i:s");
//以追写的方式的写文件
swoole_async_writefile(__DIR__.'/write.txt',$content,function($filename){
  echo "success".PHP_EOL;

},FILE_APPEND);
echo "start".PHP_EOL;
