const fs = require('fs');

const ws = fs.createWriteStream('./zzs.txt');//创建写入流

const tid = setInterval(()=>{
    const num = parseInt(Math.random()*10);
    if(num < 8){
        ws.write(num + '');//开始写入  数字转字符串
    }else{
        clearInterval(tid)
        ws.end();//写完结束 触发finish
    }
},200);


ws.on('finish',()=>{
    console.log('done');
});