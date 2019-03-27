<?php

/**
  * 禁用cookie之后如何使用session
  *  
  * 最终让session_start 在开启前拿到原来的sessionID（另外一个脚本）
  */


  //实现无COOKIE使用SESSION

  
  //方法一：利用php提供的session函数 session_id 和 session_name 来获得和设置 sessionID或name从而解决session_start产生的sessionID的情况

  //在session保存数据的脚本中获取sessionID和名字

//开启
  session_start();


$id = session_id();
$name = session_name();

//传递给另外一个脚本

echo "<a href='receive.php?{$name}={$id}' >click</a>";