import { test } from "./global";

/**
 * 
 * 调试debug
 * 
 * 两个工具   inspector  
 * 
 *
 */

 function test1(){
     const a = parseInt(Math.random()*10);
     const b = parseInt(Math.random()*10);
     const c = test2(a,b);
}
function test2(a,b){
    if(a>b){
        a+=a*2;
    }else{
        b-=a;
    }
    return a+b;
}

test1();


function test(n){
    console.log(n);
    
}
for(let i=0; i<100;i++){
    const n = parseInt(Math.random()*10)
    test(n);
}