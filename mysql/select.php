<?php
/**
 * mysqli 连接
 * select_db 选择库
 * query  /  mysqli_query 执行sql
 * num_rows  / mysqli_num_rows 获取总条数
 * fetch_row 获取内容
 */
//建立连接
$db = new mysqli('localhost','root','','myLearn');

//选择要使用的数据库 写法1
$db->select_db('myLearn');

//进行查询数据库
$query =  "select * from books";

//执行查询命令 写法1
//$result = $db->query($query);
//执行查询命令 写法2
$result = mysqli_query($db,$query);

//检索查询结果 写法1
//$num_results = $result->num_rows;
//检索查询结果 写法2
$num_results = mysqli_num_rows($result);

//循环总条数 并输出每条的数据
for($i=0;$i<$num_results;$i++){
    //输出数据
    print_r($row = $result->fetch_row());
}

//从数据库断开连接 先释放结果集 再关闭连接
$result->free();
$db->close();