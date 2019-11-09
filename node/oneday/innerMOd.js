/**
 * 
 * 引用系统内置模块
 */
const fs = require('fs');
const res = fs.readFile('./innerMOd.js',(err,data)=>{
    if(err){
        console.log(err);
    }else{
        console.log(data.toString());//打印出这个文件的所有内容

    }
    
});

console.log(res);