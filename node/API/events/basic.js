/**
 * 
 * 事件
 * 
 * 
 */
const EventEmitter = require('events');

//创建类去继承
class CustomEvent extends EventEmitter{

}

//实例化 
const ce = new CustomEvent();
ce.on('test',()=>{
    console.log('this is test');
});

//定时器
setInterval(()=>{
    ce.emit('test');
},500)
