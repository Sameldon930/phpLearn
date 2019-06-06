const fs = require('fs');

//第二个参数 可以设置字符串的类型  如果文件不存在 会抛出错误
fs.readFile('./basic.js','utf8',(err,data)=>{
    if(err) throw false;
    console.log(data );//buffer对象
});

//异步操作

const a = fs.readFileSync('./basic.js','utf8');//会比上面的执行慢
console.log(a);
