<?php
/**
 * 文件及目录处理
 * 
 */

//不断的往hello.txt头部写入一行”hello world“字符串 要求代码完整

$file = './hello.txt';
$o = fopen('',"r");//开
$g = fread($o,filesize($file));//读
$content = 'hello world'.$content;
var_dump($o);