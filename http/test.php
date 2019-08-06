<?php
header('Content-Type:application/json;charset=utf-8;');
$url = 'http://www.future_serve.com/index.php';
$arr = [
    'nozzle'=>'find_history_order',
    'token'=>'88fa61fc9e086640d97b22f60ea74d05',
    'date'=>'2019-07-31'
];
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
