var qr = require('qr-image');  
var fs = require('fs');

var code = qr.image('darshanhs', { type: 'png' });  
var output = fs.createWriteStream('a.png')
code.pipe(output);