var request=require('request');
request({
    method: 'POST',
    url: 'https://plus.dnb.com/v1/token',
    headers: 
      {
        'Content-Type': 'application/json',
        'Authorization':'Basic OXM2d2c5QnluaVY2bGtDQzZRaUdrN1lZUzJMcDJQYTQ6TElBSkRpZHJRNVY4SjMzUw==',
        'Origin':'www.dnb.com',
    },
     body: '{"grant_type" : "client_credentials"}'
},
    function (error, response, body) {
    console.log(body);
    var token=(JSON.parse(response.body)["access_token"]);
    var brr="Bearer "+token;
    request({
    method: 'GET',
    url: 'https://plus.dnb.com/v1/duns-search/ip/64.233.183.105',
    headers: 
      {
        'Content-Type': 'application/json',
        'Authorization':brr,
        'Origin':'www.dnb.com',
        }
    }, function (error, response, body) {
        console.log(JSON.parse(body));
    });













  });