<?php

//关于注释
//echo 111;
#echo 111;

//关于date函数

//关于文本
$a = 1;
$b = 2;
$c = 3;

//echo <<<theEnd
// $a
// $b
// $c
//theEnd;


//关于类型转换

$varname = 'zhangzeshan';
$$varname = '5';//此时这个变量等价于下面的 $zhangzeshan
//if($$varname == $zhangzeshan){
//    echo 111;
//}else{
//    echo 222;
//}

//关于常量  名称要大写
define('ZZS',333);
//echo ZZS;


//运算符
$str1 = 'zhang';
$str2 = '2';
if($str2 == 2){//是相等的 所以是111  但不是恒等于  例如 0 == ‘0’是true 如果是 0 ===‘0’ 那就是false
//    echo 111;
}else{
//    echo 222;
}

$f = 4;
//echo ++$f; //5
//echo $f++;//4


//引用操作符
$one  = 5;
$two = &$one;
$one = 4;
//echo $two;//此时 $two 还是5  如果使用 &  那么 $two 就变成了4

//反引号 当作命令行去解析
$cmd = `ls`;
//echo $cmd;

//







