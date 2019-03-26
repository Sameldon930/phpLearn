<?php
 
//常见的http响应设置和使用
/**
 * location:重定向 立即跳转 响应体不用解析
 * refresh:重定向 立即跳转 响应体会解析
 * content-type:内容类型 MIME类型
 * content-disposition MIME类型拓展
 */

 //header('Location:文件.php');//立即重定向

 //header('Refresh:3;url=文件.php');//3秒后重定向

//  header('Content-disposition:attachment;filename=carrot.jpg');//激活浏览器文件下载对话框 将文件下载到本地


