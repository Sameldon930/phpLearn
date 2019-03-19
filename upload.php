<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/19 0019
 * Time: 14:26
 */
header('Content-type:text/html;charset=utf-8');
echo '<pre>';
var_dump($_POST);
// $_FILES变量详解
/**
 * name是文件的名字
 * type文件类型
 * tmp_name临时文件存放位置
 * error文件上传状态的代码
 * size文件上传的大小 0表成功 详情件手册
 */
// var_dump($_FILES);//上传用$_FILES来接收
$file = $_FILES['image'];//$_FILES的一个数组
//判断是否是上传文件
if(is_uploaded_file($file['tmp_name'])){
    //如果是上传文件  那就移动到某个位置
    move_uploaded_file($file['tmp_name'],'upload/');
    var_dump(move_uploaded_file($file['tmp_name'],'upload/'));
}else{
    //如果不是 就输出
    echo"文件不是上传文件！";
}

