<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/9
 * Time: 16:34
 */
/**
 * 字符串的整理
 *
 * trim() 除去字符串开始位置和结束位置的空格   ltrim()从左边除去  rtrim()从右边除去
 *
 * sprintf 返回格式化的字符串内容
 * printf  输出整条内容 其中有的字符串（浮点数）被格式化提交
 *
 * strtoupper() 转大写
 *
 * strtolower() 转小写
 *
 * ucfirst 如果字符串的第一位是字母 那么就转大写
 *
 * ucwords  将字符串的每个单词的 第一个字母转大写
 *
 * explode  按照字符串的某个字符作为间隔 转成数组
 *
 * strtok   按照字符串的某个字符作为标识 取一次
 *
 * substr   字符串截取 去掉不需要的字符  下标从0开始
 *
 * strcmp   比大小 相等返回0  左边大于右边 返回正数  小于返回负数
 *
 * strcasecmp 区分大小写 其他同上
 *
 * strnatcmp  与之对应的不区分大小写
 *
 * strlen 检查字符串长度
 *
 * strpos 返回某个字符在字符串中的位置
 *
 * strrpos 返回的是被搜索的字符在字符串中最后一次出现的位置
 *
 * str_replace  替换字符
 *
 * substr_replace 查找和替换指定的字符
 *
 *
 *
 *
 */

$a = 'zzs,abc,zzz,zzzsd,dasd,asd,zzs,zsda,dada.sda.asdasd';
$b = 98.5;
//print($a);
//echo $a;
//printf('my name is %s',$a);//%s针对字符串替换    my name is zzs
//printf('my score is %.2f',$b);//%.2f针对浮点数替换并精确两位  98.50
//sprintf('%s',$a);//zzs
//print_r(ucwords($a));//Zzs Abc
//print_r(ucfirst($a));//Zzs abc

//$arr = explode(',',$a);
//var_dump($arr);
//$tok = strtok($a,',');
//var_dump($tok);

//$s = substr($a,1,-1);
//var_dump($s);
