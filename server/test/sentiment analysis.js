// Those tests require IDOL API key to run with.
// Try to load it from .env file...

// Create a client instance to use.
var MyClient = require('../lib/idol-client.js')('f3129194-4f03-4419-80c2-f3aa041baf9a');

MyClient.Q.longStackSupport = true;

        MyClient.analyzeSentiment({
            type: 'sync',
            parameters: {
                text: 'may not be able'
            }
        }).then(
     function(res){
        console.log(res);
         //console.log(res.code);    // => 200-299
         //console.log(res.headers);    // => Response headers
         //console.log(res.data);    // => Response data
     });

        