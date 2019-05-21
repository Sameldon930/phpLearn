<?php
header("Content-type:text/html;charset=utf-8");


echo mktime(10,11,12,11,20,1995);
echo "<br>";

$birth = mktime(0,0,0,11,20,1995);
$now = time();

$res = ($now-$birth)/(24*3600*365);

echo $res;