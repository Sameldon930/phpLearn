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
/**
 * 
 * float类型不能用于比较大小 
 */
$a = 0.1;
$b = 0.7;
//此时判断走的是no
if($a + $b ==0.8){
    echo 'yes';
}else{
    echo 'no';
}

/**
 * 布尔型   结果为false的结果   零 零点零 空字符串 零字符串 false 空数据  null
 * 
 * 0,0.0,'','0',false,array(),null
 */

 /**
  * 常量
  * const  define
  * const更快 不过他是语言结构  而define是函数
  * const可以定义类的常量 define不行
  * 当前这个类'.__CLASS__;
  * 当前方法为'.__METHOD__;
  * echo '当前目录'.__DIR__;
  * 当前文件'.__FILE__;
  * 当前行为'.__LINE__;  
  */

  echo "<hr>";
/******************************************************* */
/**
 * 
 * 
 * 运算符优先级
 * 
 * 递增递减>!>算术运算符>大小比较>（不）相等比较>引用>位运算符（^）>位运算符（|）>逻辑与>逻辑或>三目>赋值>and>xor>or
 * 
 * 
 */
$a = 0;
$b = 0;
if($a = 3 > 0 || $b = 3 > 0){
    $a++;
    $b++;
    echo $a;//   true  所以结果是1
    echo $b;//   1
}

echo "<hr>";
/******************************************************* */
$f = false || true;
$d = false  or true;

echo $f;//输出1
echo $d;// 没有输出值 因为 = 的优先级 大于 or


echo "<hr>";
/******************************************************* */
$sum = 0;
for($i=1;$i<=3;$i++){
    $sum+=$i;
    
}
echo $sum;



echo "<hr>";
/******************************************************* */
//求一组数组中的 第30个数字是多少   1，1，3，5，8，13，21，34，55

$arr = [1,1];
for($i=2;$i<30;$i++){
    //前面两个数字相加等于后面的数 比如 第三位的数字i 等于 第一位的数字i-2加上第二位的数字i-1   以此类推
    $arr[$i] = $arr[$i-1] + $arr[$i-2];
}
var_dump($arr[29]);

echo "<hr>";
/******************************************************* */

//编写一个函数 实现open_door 转换成 OpenDoor make_by_id转换成MakeById
function strH