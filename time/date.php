<?php
/**
 * date
 * 格式化一个本地时间
 */

 header("Content-type:text/html;charset=utf-8");

 echo date("Y年m月d日");//2019年05月21日
 echo "<br>";

 echo date("Y-m-d");//2019-05-21
 echo "<br>";

 echo date("Y");//2019
 echo "<br>";

 echo date("y-n-j");//小y代表年份后两位  n代表不带零的月份 j代表不带零的日
 echo "<br>";

 echo date("H:i:s a");//06:55:55 am
 echo "<br>";
 echo date("g:i:s"); //6:56:57
 echo "<br>";

 echo date("w");//返回一周内的第几天  1星期一 2星期二 0星期天


 echo "<br>";

 $res = date("L")?"是闰年":"不是闰年";
 echo $res;
 echo "<br>";

 echo date("W");

 echo "<br>";

 echo date("z");

 echo "<br>";

 echo date("t");