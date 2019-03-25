<?php


//数据库更新数据  


//引入初始文件   mysql.php
include_once 'mysql.php';

//组织mysql指令

$pubtime = time();
//更新通常都是根据id进行更新  Id传递过来
$sql = "update n_news set title = '哈哈哈哈'  where id = 1" ;

//执行指令
if(mysql_query($sql)){
    //操作成功 通常是返回自增长id给用户
    echo '数据更新成功！';
}else{
    echo '数据更新失败！';
}



