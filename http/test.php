<?php
header('Content-Type:application/json;charset=utf-8;');
$url = 'api.xjzcdn.bianzhao168.com/Pay_Trade_query.html';

$arr = [];
$arr['pay_memberid'] = '10012';
$arr['pay_orderid'] = '201903271620070001';
$arr['pay_md5sign'] = '7359867CD776B3E3145243222F65C6BB';
$o = "";
foreach ( $arr as $k => $v )
{
    $o.= "$k=" . urlencode( $v ). "&" ;
}
$arr = substr($o,0,-1);
// var_dump($arr);

$res = post_json_data($url, $arr);
var_dump($res);
function post_json_data($url, $data_string)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            )
        );
        ob_start();
        curl_exec($ch);
        $return_content = ob_get_contents();
        ob_end_clean();
        $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        return $return_content;
}
