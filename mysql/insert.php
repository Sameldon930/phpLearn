<?php
/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/17
 * Time: 15:30
 */

$db = new mysqli('localhost','root','','myLearn');


$a = $db->select_db('myLearn');

$author = 'lhl';
$title = 'linhailan';
$price = 1314;

$query = "insert into books values('$author','$title','$price')";

$result = $db->query($query);
var_dump($result);
echo $db->affected_rows;