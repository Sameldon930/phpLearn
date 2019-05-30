<?php
//接收前台提交的数据
$title = $_POST['title'];
$content = $_POST['content'];
$user_name = $_POST['user_name'];

//进行判断
if(empty($title) || ($content)  || empty($user_name)){
    exit
}