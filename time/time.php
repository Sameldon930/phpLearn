<?php

/**
 * 
 * 时间戳
 * 
 */

header("Content-type:text/html;charset=utf-8");

echo date("Y-m-d",time());
echo "<br>";

echo date("Y-m-d H:i:s",time()+24*60*60);
echo "<br>";


echo date("Y-m-d H:i:s",time()+7*24*60*60);
echo "<br>";

echo date("Y-m-d H:i:s",time()-14*24*60*60);
echo "<br>";


