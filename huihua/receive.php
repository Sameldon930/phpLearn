<?php

//接收数据
$name = session_name();
$id = $_GET[$name];

//设定sessionID
session_id($id);

session_start();
var_dump($_SESSION);