<?php


// pdo连接数据 进行插入



//接收前台提交的数据
$title = $_POST['title'];
$content = $_POST['content'];
$user_name = $_POST['user_name'];

//进行判断
if(empty($title) || empty($content)  || empty($user_name)){
    exit('标题或者内容 或者留言人不能为空');
}

try{
    $dsn = 'mysql:dbname=zzs_yaf;host=localhost';
    $username = 'root';
    $password = '123456';
    $arr = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
    $pdo = new PDO($dsn,$username,$password,$arr);
    $sql = 'insert into message(title,content,created_at,user_name) values(:title,:content,:created_at,:user_name)';
    
    
    $q = $pdo->prepare($sql);
    $data = [
        ':title'=>$title,
        ':content'=>$content,
        ':created_at'=>time(),
        ':user_name'=>$user_name
    ];
    $q->execute($data);//执行
    $rows = $q->rowCount();
    
    if($rows){
        exit('添加成功');
    }else{
        exit('添加成功');
    }
}catch(Exception $e){
    echo $e->getMessage();
}