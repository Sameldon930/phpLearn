<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/9
 * Time: 14:14
 */
/**
 * 可变函数
 * gettype  获取类型
 * settype  设置类型
 */
$a = 4;
//echo gettype($a);//integer

settype($a,'bool');
//echo $a;//1

/**
 * 测试函数
 *
 * is_array 是否是数组
 *
 * is_double  is_float is_real 是否浮点数
 *
 * is_long is_int is_integer   是否整数
 *
 * is_string  是否字符串
 *
 * is_bool 是否布尔值
 *
 * is_object 是否对象
 *
 * is_null 是否null
 *
 * is_scalar 是否 整数 布尔值 字符串 浮点数
 *
 * is_numeric 是否任何类型的数字或数字字符串
 *
 * is_callable 是否是有效的函数名
 *
 * isset 变量是否存在 如果存在返回true
 *
 * unset 销毁传进来的变量
 *
 * empty 变量是否存在 是否则为空和非0
 *
 * intval  floatval strval  转换变量数据类型
 */


/**
 * if
 */
//情况1
$x = 2;
if($x) //echo $x;
//情况2
if($x < 2){
    //echo $x-2;
}else{
    //echo $x;
}
//情况3
if($x > 2){

}elseif ($x <2){

}elseif ($x = 1){

}
//情况4
if($x < 3){

}elseif ( $x > 3){

}else{

}
///情况5
if($x==2):
//    echo $x;
endif;

/**
 * switch
 *
 */
$y = 2;
switch ($y){
    case '1':
//        echo 1;
        break;
    case '2':
//        echo 2;
        break;
    case '3':
//        echo 3;
        break;
    default:
//        echo 4;
        break;
}


/**
 *
 * 循环  不知道次数的时候  使用while
 * while(condition){expression}
 *
 * 知道次数的  使用for
 * for(expression1;condition;expression2){expression3}
 * expression1  设置初始值  expression2 满足条件才执行
 *
 * do..while  可以写出死循环
 */
//while
$num = 1;
while ($num < 5){
//    echo $num."<br/>";
    $num ++;
}
//for
$num1 = 1;
for($i=1;$i<5;$i++){
//    echo $num1;
}
//do..while
//$num3 = 1;
//do{
////    $num3++;//没有进行增加处理就会死循环
////    echo $num3;
////    echo `php -v`;
//}while($num3 < 5);


/**
 * 文件处理
 *
 */
//打开文件
$fp = fopen('../log.txt','r');
//写文件  使用fwrite 或者fputs 后者是前者的别名
$content = 'zhangzeshan';
$fw = fwrite($fp,$content);//将content写入文件
//也可以用file_put_content()  而且不需要fopen打开文件
//关闭文件  成功返回true
fclose($fp);

