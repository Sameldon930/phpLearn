/**
 * 
 * 移除事件
 * 
 */

const EventEmitter = require('events');

class CustomEvent extends EventEmitter{

}


function fn1(){
    console.log('fn1');
    
}
function fn2(){
    console.log('fn2');
}

const ce = new CustomEvent();
ce.on('test',fn1);
ce.on('test',fn2);


setInterval(()=>{
    ce.emit('test')
},500)

setTimeout(()=>{
    ce.removeListener('test',fn2);//在1500毫秒之后 移除fn2
    ce.removeListener('test',fn1);//在1500毫秒之后 移除fn1

    ce.removeAllListeners('test');//移除 fn1 fn2
},1500)