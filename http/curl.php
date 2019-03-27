<?php
// php模拟http请求

/**
 * curl扩展库的使用
 * 首先在php.ini开启扩展
 * curl_init() 建立连接 激活curl的连接功能
 * curl_setOpt() 设置选项 
 * curl_exec 执行与服务器的连接
 * curl_close 关闭资源
 */

 /**
  * curl_setOpt
  * 
  * curlopt_url:连接对象
  * curlopt_returntransfer:将服务器执行的结果以文件流的形式返回到请求界面
  * curlopt_post:是否才有post方式发起的请求 默认是get
  * curlopt_postfields:用来传递post提交的数据 分为两种 字符串(name=12&age=123) 以及数组形式 array(''=>'',''=>'')
  * curlopt_header: 是否得到响应的header信息 默认不获取
  */

//开启会话
header('Content-type:text/html;charset=utf-8');
$ch = curl_init();

//设置选项
curl_setopt($ch,CURLOPT_URL,'localhost/phpLearn/uploads/one_upload.html');//设置url
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);//返回数据
curl_setopt($ch,CURLOPT_HEADER,0);//是否获取响应头的信息  0否 1是


//如果要使用post
curl_setopt($ch,CURLOPT_POST,TRUE);//使用POST
curl_setopt($ch,CURlOPT_POSTFIELDS,array());//post提交的数据 存在数组里面



//执行连接
 $content = curl_exec($ch);//
//关闭连接
curl_close($ch);