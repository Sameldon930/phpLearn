<?php

//访问其他文件存到的session  通过sessionID实现跨脚本访问
header('Content-type:text/html;charset=utf-8;');
session_start();

unset($_SESSION['msg']);//删除一个session信息
$_SESSION = array();
print_r($_SESSION) ;//删除整个session

