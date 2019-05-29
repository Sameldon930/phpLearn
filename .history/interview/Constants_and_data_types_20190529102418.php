<?php
/**
 * 
 * 常量和数据类型
 * 
 * 
 * 单引号不能解析变量 不能解析转义字符 只能解析单引号和反斜杠本身  单引号效率高于双引号
 * 
 * 双引号可以解析变量 可以使用特殊字符和{}包含 可以解析所有转义字符
 */

 $a = 'a b c d e f $a g';
 $b = "a b c d e f '{$a}' g h";

 echo $a;
 echo "<pre>"
