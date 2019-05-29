<?php
/**
 * 
 * 常量和数据类型
 * 
 * 
 * 单引号不能解析变量(原样输出) 不能解析转义字符 只能解析单引号和反斜杠本身  单引号效率高于双引号
 * 
 * 双引号可以解析变量（输出变量内的值） 可以使用特殊字符和{}包含 可以解析所有转义字符  {}不会返回出来 起到分割作用
 */

 $a = 'a b c d e f $a g';//a b c d e f $a g
 $b = "a b c d e f '{$a}' g h";//a b c d e f 'a b c d e f $a g' g h    

 echo $a;
 echo "<pre>";
 echo $b ;
 echo "<hr>";
/******************************************************* */
//原样输出
$dd = <<<EOT
ASDASDASDADA
ASDASDASDADAASDASDASDADAASDASDASDADA
ASDASDASDADA
ASDASDASDADA
ASDASDASDADA
ASDASDASDADA
ASDASDASDADA
EOT;

echo $dd;

echo "<hr>";
/******************************************************* */

$a = 0.1;
$b = 0.7;
if($a + $b = 0.8){
    
}
