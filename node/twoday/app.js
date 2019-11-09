const http = require('http');
const chalk = require('chalk');
const conf =require('./config/defalutConfig');

//创建server req 请求 res反馈
const server = http.createServer((req,res)=>{

});

server.listen(conf.port,conf.hostname,()=>{

})