<?php
/**
 * 文件及目录处理
 * 
 */

//不断的往hello.txt头部写入一行”hello world“字符串 要求代码完整------------------文件的读取

$file = './hello.txt';
$open = fopen($file,"r");//读状态开
$read = fread($open,filesize($file));//读
$content = 'hello world'.$read;//编写内容 拼接上文件原有内容
fclose($open);
$open = fopen($file,'w');//写状态开
fwrite($open,$content);//将内容写入
fclose($open);//关闭


//对目录进行遍历--------------目录的读取

$dir = './test';
//打开目录 读取目录中的文件 如果文件是目录 就继续打开 读取下面的文件  如果是文件 输出文件名称  如果是目录 打开目录
function loopDir(){
    $handle = opendir($dir);
    while
}