/**
 * 事件参数
 */
const EventEmitter = require('events');

class CustomEvent extends EventEmitter{

}

const ce  =  new CustomEvent();

//事件处理  error
ce.on('error',(err,time)=>{
    console.log(err);
    console.log(time);

});

ce.emit('error',new Error('ooo???'),Date.now());