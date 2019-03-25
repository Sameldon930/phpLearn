<?php

// 数据库连接操作

//做数据库初始化
header('Content-type:text/html;charset=utf-8');

//主机地址默认是连接端口 3306
mysql_connect('localhost:3306','root','root') or die('数据库连接失败！');//短路运算


// 封装mysql语法错误检查函数并执行
// $sql 表示查询的语句
function my_error($sql){
    //先执行mysql
    $res = mysql_query($sql);
    if(!$res){
        echo 'sql执行错误，错误编号为'.mysql_errno().'<br/>';
        echo 'sql执行错误，错误信息为'.mysql_error().'<br/>';
        exit;   
    }
    return $res;
    
    
}

//设置字符集 mysql_set_charset
mysql_set_charset('utf8');


//选择数据库
//mysql_query执行mysql语句的函数

mysql_query("use learn");




