<?php
header('Content-Type:application/json;charset=utf-8;');

function createHtmlTag($tag = ""){
    echo "<h1>$tag</h1><br/>";
}

// echo "hello";

// createHtmlTag("JSON和serialize对比");

$members = array("username","age");

//数组编码成json
$jsonobj = json_encode($members);
var_dump($jsonobj);
//序列化数组
$serobj = serialize($members);
var_dump($serobj);


// createHtmlTag($jsonobj);
// createHtmlTag($serobj);
