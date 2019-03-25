<?php
include_once 'mysql.php';

//组织查询操作

$sql = 'select * from n_news';
$res = mysql_query($sql);
if(!$res){
    echo mysql_error();
}
mysql_num_rows($res);//获取结果有几行
mysql_num_fields($res);//获取字段的个数
mysql_field_name($res,1);//获取指定字段内容
mysql_fetch_assoc($res);//结果集中取得一行作为关联数组