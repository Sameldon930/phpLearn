<?php

// 解析文件
$data = simplexml_load_file("./xpath.xml");
//遍历 root下的man标签下的name属性
$res = $data->xpath('/root/man/name');

// var_dump($res);

// 这个文件中只要是name标签 都遍历出来
$res2 = $data->xpath("//name");

// var_dump($res2);


// man标签下面的所有 都遍历出来
$res3 = $data->xpath("//man/*");

// man标签下面age的值大于12的所有都遍历出来
$res4 = $data->xpath("//man[age>12]");

var_dump($res4);