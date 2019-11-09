<?php
$p = fopen('a.txt','a');//打开一个文件
fwrite($p,'zzs');//往文件写入内容
fclose($p);//关闭这个文件