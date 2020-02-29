<?php

/**
 * Created by PhpStorm.
 * User: zzs-pc
 * Date: 2019/11/23
 * Time: 16:12
 */
$symbol = "AMZN";
$url = "http://finance.yahoo.com/d/quotes.csv" .
    '?s=' . $symbol . '&e=.csv&f=sl1d1t1clohgv';
//if (!($contents = file_get_contents($url))) {
//    die("fail");
//}
//list($symbol, $quote, $date, $time) = explode(',', $contents);
//$date = trim($date, '"');
//$time = trim($time, '"');
//echo '<p>'.$symbol.'was lost sold at :'.$quote.'<p>';
//echo '<p>'.$date.' :'.$time.'<p>';
//echo $url;


/**
 * parse_url()
 * 返回url不同部分的相关数组
 * scheme      http
 * host        example.com
 * port        80
 * user        nobody
 * pass        secret
 * path       /script.php
 * query      variable=value
 * fragment   anchor
 */
$purl = "http://nobody:secret@example.com:80/script.php?variable=value#anchor";
print_r(parse_url($purl));