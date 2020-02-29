<?php
/**
 * 操作内存表
 */

//创建内存表
$table = new swoole_table(1024);

/**
 * 内存表增加一列  类型于定义字段
 * 字段名 数据类型 数据长度
 * 字符串类型的字段必须指定数据长度
 */
$table->column("id",$table::TYPE_INT,4);
$table->column("name",$table::TYPE_STRING,64);
$table->column("age",$table::TYPE_INT,3);
$table->create();

/**
 * 设置行的数据，相当于插入一条记录
 * key value
 */
//set的写法1
$table->set("zzs",["id"=>1,"name"=>"zhangzeshan","age"=>12]);
//写法2
$table['zzs2']=[
    "id"=>2,"name"=>"zhangzeshan2","age"=>122
];

//获取某个key的value  写法1  获取到的是 数组
//$res1 = $table->get("zzs2");
////写法2  获取到的是 对象
//$res2 = $table['zzs2'];

//自增操作  key 里面的 key 的值 进行加2 处理
$table->incr('zzs2','age',2);
//自减操作  key 里面的 key 的值 进行减3 处理
$table->decr('zzs2','age',3);

//删除操作
$table->del('zzs');

//输出结果
print_r($table['zzs']);
