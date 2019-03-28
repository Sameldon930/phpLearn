<?php


/**
 * 手机短信接口的使用  荣联云通信
 * ACCOUNT SID:8aaf0708697b6beb0169c313bd4e31d5
 * AUTH TOKEN:d088f8f21d7442b29d119fa2933fd4e0
 * 
 */



include_once("./CCPRestSDK.php");

//主帐号
$accountSid= '8aaf0708697b6beb0169c313bd4e31d5';

//主帐号Token
$accountToken= 'd088f8f21d7442b29d119fa2933fd4e0';

//应用Id
$appId='8aaf0708697b6beb0169c31db92731f3';

//请求地址，格式如下，不需要写https://
$serverIP='sandboxapp.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';

//调用方法  
sendTemplateSMS("18250305186",array('2345','60'),"1");


/**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('验证码','分钟数')，如不需替换请填 null
  * @param $tempId 模板Id   1 2 3
  */       
function sendTemplateSMS($to,$datas,$tempId)
{
     // 初始化REST SDK
     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
     $rest = new REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken);
     $rest->setAppId($appId);
    
     // 发送模板短信
     echo "Sending TemplateSMS to $to <br/>";
     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
         echo "error code :" . $result->statusCode . "<br>";
         echo "error msg :" . $result->statusMsg . "<br>";
         //TODO 添加错误处理逻辑
     }else{
         echo "Sendind TemplateSMS success!<br/>";
         // 获取返回信息
         $smsmessage = $result->TemplateSMS;
         echo "dateCreated:".$smsmessage->dateCreated."<br/>";
         echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
         //TODO 添加成功处理逻辑
     }
}



?>