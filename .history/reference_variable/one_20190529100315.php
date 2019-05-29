<?php

/**
 * 引用变量的相关知识
 * 
 */

$a = range(1,1000);//一个数组 1到1000
var_dump(memory_get_usage());

$a = $ba;