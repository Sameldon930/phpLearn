<?php

//一维数组
$arr1 = array(
    "username"=>'zzs',
    "age"=>12,
    "sex"=>"man"
);
//二维数组
$arr2 = array(
    array(
        "username" => 'zzs',
        "age"=>12,
        "sex"=>"man"
    ),
    array(
        "username" => 'clp',
        "age"=>12,
        "sex"=>"woman" 
    )
);






var_dump(json_encode()$arr1);
echo "<br/>";
var_dump($arr2);

