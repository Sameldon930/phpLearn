<?php

/**
 * 正则表达式
 */


//后向引用
$str = '<b>abc</b>';//字符串
$pattern = '/<b>(.*)<\/b>/';//匹配规则
var_dump(preg_replace($pattern,'\\1',$str));//abc
//\\1转义符号 意思是 \1 也就是规则中第一个括号的内容



$str = '13960015891';
$pattern = '/^139\d{8}/';//139开头的手机号
preg_match($pattern,$str,$match);
var