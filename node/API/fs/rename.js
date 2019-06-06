/**
 * 重命名
 */
const fs = require('fs');
fs.rename('./test','zzs.txt',(err)=>{
    if(err) throw err;
    console.log('done');
    
})