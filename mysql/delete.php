<?php


//数据库删除数据  


//引入初始化操作    mysql.php
include_once 'mysql.php';

//组织mysql指令

$pubtime = time();
//更新通常都是根据id进行更新  Id传递过来
$sql = "delete from n_news where id = 1" ;

//执行指令
if(mysql_query($sql)){
    //操作成功 通常是返回自增长id给用户
    echo '数据删除成功！';
}else{
    echo '数据删除失败！';
}



