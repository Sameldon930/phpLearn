<?php

/**
 * 
 * 变量的序列化和反序列化技术
 * 
 * 序列化：将一个内存形态存在的变量的非持久数据 转换成硬盘形态存在的物理数据的过程
 * 
 * 反序列化：将之前序列化之后的硬盘形态存在的物理数据 恢复为序列化之前的内存形态存在的变量数据的过程
 * 
 * 
 * 变量数据序列化的过程分为两步：
 * 将变量的serialize()函数进行处理 获得字符串结果  $str = serialize($v1) $v1是一个变量 自然也是一个数据
 * 将字符串结果 保存为文件到硬盘中  file_put_contents("文件路径",$str)
 * 
 * 磁盘数据反序列化的过程分为两步：
 * 从文件中读取序列化的结果 $str = file_get_content('文件路径');
 * 将字符串使用unserialize()j进行处理 获得原始数据   $v1 = unserialize($str)
 */

 //演示序列化
 $v1 = 1; $str1 = serialize($v1);
 $v2 = 2.2; $str2 = serialize($v2);
 $v3 = "acaca"; $str3 = serialize($v3);
 $v4 = true; $str4 = serialize($v4);
 $v5 = array(51,53,45); $str5 = serialize($v5);
 //将结果 写入并创建到一个文件中
file_put_contents('../record1.txt',$str1);//i:1;
file_put_contents('../record2.txt',$str2);//d:2.2
file_put_contents('../record3.txt',$str3);//s:5:"acaca"
file_put_contents('../record4.txt',$str4);//b:1
file_put_contents('../record5.txt',$str5);//a:3:{i:0;i:51;i:1;i:53;i:2;i:45;}

//演示反序列化
$str1 = file_get_contents('../record1.txt');$v1 = unserialize($str1);
$str2 = file_get_contents('../record2.txt');$v2 = unserialize($str2);
$str3 = file_get_contents('../record3.txt');$v3 = unserialize($str3);
$str4 = file_get_contents('../record4.txt');$v4 = unserialize($str4);
$str5 = file_get_contents('../record5.txt');$v5 = unserialize($str5);
var_dump($v1);
var_dump($v2);
var_dump($v3);
var_dump($v4);
var_dump($v5);
