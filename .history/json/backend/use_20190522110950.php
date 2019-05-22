<?php
header('Content-Type:application/json;charset=utf-8;');

function createHtmlTag($tag = ""){
    echo "<h1>$tag</h1><br/>";
}

echo "hello";

createHtmlTag("JSON和serialize对比");

$members = array("username","age");

$jsonobj = jo