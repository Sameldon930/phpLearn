/**
 * 
 * buffer 缓冲 
 * Buffer.byteLength
 * 
 * 用于处理二进制数据流
 * 
 * 实例类似整数数组 大小固定
 * 
 * 
 */
//Buffer
console.log(Buffer.alloc(10));//长度为10 <Buffer 00 00 00 00 00 00 00 00 00 00>
console.log(Buffer.alloc(5,1));//<Buffer 01 01 01 01 01>
console.log(Buffer.allocUnsafe(5,1));//<Buffer e0 a0 52 2b 61>
console.log(Buffer.from([1,2,3]));//<Buffer 01 02 03>


// Buffer.byteLength   isBuffer
console.log(Buffer.byteLength('test')); // 字节长度 4
console.log(Buffer.byteLength('张泽山')); // 字节长度 9
console.log(Buffer.isBuffer({}));//是不是 buffer对象  false
console.log(Buffer.isBuffer(Buffer.from([1,2,3])));//是不是buffer对象  true

//concat  连接
const buf1 = Buffer.from('This');//  <Buffer 54 68 69 73>
const buf2 = Buffer.from('is');
const buf3 = Buffer.from('zzs');

const conbuf = Buffer.concat([buf1,buf2,buf3]);
console.log(conbuf.toString());//Thisiszzs


//buf.length buf.toString buf.fill 

const buf = Buffer.from('this zzs');
console.log(buf.length);//8

const allfuf = Buffer.allocUnsafe(10);//长度为10 <Buffer 00 00 00 00 00 00 00 00 00 00>
allfuf[0] = 2
console.log(allfuf.length);//10
console.log(buf.toString('base64'));//没有传参数 默认是utf-8   
console.log(buf.fill(2,2,5));//填充内容是2 从第二个开始 到 第五个   <Buffer 74 68 02 02 02 7a 7a 73>

//buf.equals 
const eqbuf1 = Buffer.from('test');
const eqbuf2 = Buffer.from('test');
const eqbuf3 = Buffer.from('test');

console.log(eqbuf1.equals(eqbuf2));//比较两个对象中的内容是否相等    true

//buf.indexof 
console.log(eqbuf1.indexOf('es'));//存在的字符串 存在返回1 
console.log(eqbuf1.indexOf('aes'));//不存在的字符串 不存在返回 -1 


