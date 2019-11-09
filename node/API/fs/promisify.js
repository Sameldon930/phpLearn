/**
 * 
 * 解决回调地狱
 * 
 */

const fs = require('fs');
const promisify = require('util').promisify;

const read = promisify(fs.readFile);//转成 promiss



async function test(){
    try{
        const content = await read('./zzs.txt');

        console.log(content.toString());

    }catch(ex){
        console.log(ex);
        
    }
    
    
}

test();