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
$table->column("age",$table::TYPE_STRING,3);
$table->create();

/**
 * 设置行的数据，相当于插入一条记录
 * key value
 */
$table->set("zzs",["id"=>1,"name"=>"zhangzeshan","age"=>12]);

//获取某个key的value
$res = $table->get("zzs");
//输出结果
print_r($res);
