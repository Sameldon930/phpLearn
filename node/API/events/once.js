/**
 * 事件处理程序只执行一次  once
 */
const EventEmitter = require('events');

class CustomEvent  extends EventEmitter{

}
const ce = new CustomEvent();

ce.once('test',()=>{
    console.log('test');
    
})
//就算设置了定时器 还是只执行一次

setInterval(()=>{
    ce.emit('test')
},500)
