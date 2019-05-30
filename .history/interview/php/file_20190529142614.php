<?php
/**
 * 文件及目录处理
 * 
 */

//不断的往hello.txt头部写入一行”hello world“字符串 要求代码完整

$file = './hello.txt';
$open = fopen('',"r");//开
$read = fread($open,filesize($file));//读
$content = 'hello world'.$read;//编写内容 拼接上文件原有内容
fclose($open);
$open = fopen($file,'w');
fw