<?php

/**
 * 
 * session原理
 *  session_start() 开启session会话 此时会自动检测sessionID
 *  如果cookie中存在 使用现成的
 *  如果cookie中不存在 创建新的sessionID 并通过响应头以cookie形式保存到浏览器上
 * 
 *  初始化超全局变量 $_SESSION
 * 
 *  php通过sessionID去查找匹配的文件 如果不存在就创建以sessionID命名的文件
 *  如果存在就读取文件内容 将数据存储到$_session中
 *  
 */

 /**
  * session的使用
  * $_SESSION 是通过session_start() 的函数调用后才定义的
  *
  *
  *
  */

/**
  * 设置session的信息
  * 
  *
  *
  *
  */
  header('Content-type:text/html;charset=utf-8;');
    //开启session
  session_start();

//   设置session数据
$_SESSION['name'] = 'zzs';
$_SESSION['msg'] = array(
    'age'=>'1',
    'sex'=>'男'
);


