<?php
 


//  session 基础配置--------------php.ini

/**
 * session.name：保存到cookie中sessionID对应的名字
 * session.auto_start：是否自动开启 无需手动session_start 默认是关闭的
 * session.save_handler：session数据的保存形式，默认是文件形式
 * session.save_path:session文件默认存储位置
 */

 //开启session
 session_start();

//销毁session
 session_destroy();

