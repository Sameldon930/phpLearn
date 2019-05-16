<?php

$data = simplexml_load_file('../grammar/property.xml');

// 添加子节点
$man = $data->addChild('man');

// 给新增的节点增加内容
$man->addChild('name','玉帝');
$man->addChild('age','999');

var_dump($data);

//将添加的节点内容 新增到xml文件中

$data->asXML('../grammar/property.xml');

