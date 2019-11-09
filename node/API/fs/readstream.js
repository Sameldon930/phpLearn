const fs = require('fs');

const rs = fs.createReadStream('./readstream.js');//创建流

rs.pipe(process.stdout);读出当前文件内容