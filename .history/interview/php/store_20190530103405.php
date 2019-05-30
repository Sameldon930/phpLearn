<?php
//接收前台提交的数据
$title = $_POST['title'];
$content = $_POST['content'];
$user_name = $_POST['user_name'];

//进行判断
if(empty($title) || ($content)  || empty($user_name)){
    exit('标题或者内容 或者留言人不能为空');
}

try{
    $dsn = 'mysql:dbname=zzs_yaf;host=localhost';
    $username = 'root';
    $password = '';
    $arr = [
        PDO::ATTR_ERRMODE => p
    ];
}catch(Exception $e){
    echo $e->getMessage();
}