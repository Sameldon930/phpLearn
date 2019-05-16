<?php

// 专门读取xml文件 解析xml文档 返回php对象
$data = simplexml_load_file('../grammar/property.xml');
echo '<pre>';
var_dump($data);
var_dump($data->man->name);  //拿到当前对象的man对象下面的name属性
