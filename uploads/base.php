<?php
//文件在web服务器中临时存储的位置
//$_FILES['userfile']['tmp_name'];

//用户系统中文件名称
//$_FILES['userfile']['name'];

//文件的字节大小
//$_FILES['userfile']['size'];

//文件MIME类型例如 text/plain/image/gif
//$_FILES['userfile']['type'];

//文件上传相关的错误代码
/**
 * 0 没有发生任何错误
 * 1 文件超过上传的最大值
 * 2 文件过大
 * 3 文件部分上传
 * 4 没有文件上传
 * 6 没有指定临时目录
 * 7 上传文件无法写磁盘
 */
//$_FILES['userfile']['error'];

//确保处理的文件被上传
//is_uploaded_file()
//move_uploaded_file()

//降低风险 使用basename 来修改所接受的文件的名称
$path = "/home/httpd/html/index.php";
$file1 = basename($path);
$file2 = basename($path, ".php");
//echo $file1;//index.php
//echo $file2;//index

/////////////////////////////////


//获取路径的目录部分
echo dirname($path);///home/httpd/html

//获取路径的文件名称
echo basename($path);//index.php


/////////////////////////////////


//创建和删除目录
//mkdir(路径，权限)
//rmdir()

















