<?php


//数据库新增数据  


//引入初始文件   mysql.php
include_once 'mysql.php';

//组织mysql指令

$pubtime = time();
$sql = "insert into  n_news values(null,'zzssadasd',1,'1312dasdasdadas','aaa',{$pubtime})" ;

//执行指令
if(mysql_query($sql)){
    //操作成功 通常是返回自增长id给用户
    echo '数据插入成功！';
}else{
    echo '数据插入失败！';
}



?>