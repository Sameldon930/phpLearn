<?php

/**
 * 正则表达式
 */
$pattern = '/139\d{8}/';

//后向引用
$str = '<b>abc</b>';//字符串
$pattern = '/<b>(.*)<\/b>/';//匹配规则
varpreg_replace($pattern,'\\1',$str);//\\1转义符号 意思是 \1 也就是规则中第一个括号的内容

