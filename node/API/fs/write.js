/**
 * 
 * 
 * 写文件
 * 
 * 
 * 
 */

const fs =  require('fs');

//写  参数1 文件名  参数二 写入内容  参数三 编码类型  参数四 回调

const content = Buffer.from('hello my world');//一个对象 传入之后 由于utf8 转成字符串
fs.writeFile('./test',content,{
    encoding:'utf8'
},err=>{
    if(err) throw false;
    console.log('done');//如果写入成 返回done
    
});