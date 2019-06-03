/**
 * 
 * buf.copy
 *
 */

const StringDecoder = require('string_decoder').StringDecoder;
const deco = new StringDecoder('utf8');


const buf = Buffer.from('张泽山');

for(let i=0;i<buf.length;i+=5){
    const b =Buffer.allocUnsafe(5);
    buf.copy(b,0,1);
    
    console.log(b.toString());
    
}

for(let i=0;i<buf.length;i+=5){
    const b =Buffer.allocUnsafe(5);
    buf.copy(b,0,1);
    
    console.log(deco.write(b));
    
}
