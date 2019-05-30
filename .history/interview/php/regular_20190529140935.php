<?php

/**
 * 正则表达式
 */


//后向引用
$str = '<b>abc</b>';//字符串
$pattern = '/<b>(.*)<\/b>/';//匹配规则
var_dump(preg_replace($pattern,'\\1',$str));//abc
//\\1转义符号 意思是 \1 也就是规则中第一个括号的内容
echo "<hr>";
/******************************************************* */

//匹配139开头的手机号码
$str = '13260015891';
$pattern = '/^139\d{8}/';
preg_match($pattern,$str,$match);
var_dump($match);
echo "<hr>";
/******************************************************* */
//取出页面中所有img标签中的src值
$str = '<img alt="zzcz" id="zzs" src="a.jpg">';
$pattern = '/<img.*sr>/';
