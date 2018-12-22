'use strict';

//Module declaration
var request = require('request');
var https = require('https');
var cors = require('cors')
var express = require('express');
var app = express();
app.use(cors());
var Twitter = require('twitter');
var client = new Twitter({
    consumer_key: 'consumer_key',
    consumer_secret: 'consumer_secret',
    access_token_key: 'access_token_key',
    access_token_secret: 'access_token_secret'
});
var watson = require('watson-developer-cloud');
var MyClient = require('../lib/idol-client.js')('id');
MyClient.Q.longStackSupport = true;
var AlchemyAPI = require('alchemy-api');
var alchemy = new AlchemyAPI('id');
var apiKey = "apiKey"; // Get from kandy.io 
var userId = "userId"; // Get from kandy.io 
var password = "password"; // Get from kandy.io 
var Kandy = require("kandy");
var kandy = new Kandy(apiKey);
var userAccessToken;
kandy.getUserAccessToken(userId, password, function(data, response) {
    var dataJson = JSON.parse(data);
    console.log(dataJson.result.user_access_token);
    userAccessToken = dataJson.result.user_access_token;
});

kandy = new Kandy();
var sendgrid = require('sendgrid')('id', 'pwd');
var accountSid = 'accountSid';
var authToken = 'authToken';
var clientTwilio = require('twilio')(accountSid, authToken);
var speech_to_text = watson.speech_to_text({
    username: 'username',
    password: 'password',
    version: 'v1'
});
//company ip declaration

// var ips=['0','23.13.169.35','23.196.118.201','23.195.87.224','64.233.183.105',
// '31.13.71.1','23.195.91.218','208.54.70.10','209.99.98.33','23.195.80.170','208.54.70.10','159.153.103.209',
// '72.172.89.185','23.13.163.95','208.54.70.8'];
// var cid=['0','1864','162479','1066','1441','10667','1497','2018','5617','1063','1481','162717','5329','164215','1053'];
// var ipname=['','3M','Apple Inc','Motorola Mobility','Google Inc','Facebook','AMD','Applied Materials',
// 'Cirrus Logic','Cisco Systems','eBay/PayPal','Bioware','Blizzard Entertainment','Hoovers','Intel Corporation']



//send mail from employer to student
app.get('/sendMail', function(reqst, rspns) {
    console.log(reqst.query); //here lies the params
    var toEmailAddress = reqst.query.number;
    var subjectMail;
    var name;
    var companyName;
    var textMail=reqst.query.txtval;
    //get from "name","to email address","company name"
    sendgrid.send({
        to: toEmailAddress,
        from: 'id',
        subject: 'Hello World',
        text: textMail
    }, function(err, json) {
        if (err) {
            return console.error(err);
        }
        rspns.end();
    });

});

//send sms from employer to student
app.get('/sendSms', function(reqst, respns) {
  console.log(reqst.query);
    var from = "+num"; // Optional 
    var to = "+1"+reqst.query.number; // Required ,change it
    var text = reqst.query.txtval; // Required ,change it


    kandy.sendSms(userAccessToken, from, to, text, function(data, response) {
        var dataJson = JSON.parse(data);
        console.log(dataJson);
        if (dataJson.message == "success") {
            console.log("Sent to " + to + ": " + text);
            respns.end();
        }
    });

});

//analyse company score in twitter passing tweet to ibm sentiment analyser
app.use('/twitterCompanySentiment', function(reqst, respns) {

    //get companyname from request
    var companyName;
    client.get('search/tweets', {
        q: companyName
    }, function(error, tweets, response) {

        var length = (tweets.statuses.length);
        console.log(length);
        var total = 0;
        var count = 0;
        (tweets.statuses).forEach(function(e) {
            var text = e.text;
            console.log(text);
            alchemy.sentiment(text, {}, function(err, response) {
                if (err)
                    throw err;
                var sentiment = response.docSentiment;
                console.log(sentiment);
                //asd=sentiment;
                //res.send(asd);
                total += sentiment
            });
        });
        total = total / length;
        res.send(total);
    });
});

//linkedin jobs feed
app.use('/linkedjobsfeed', function(req, res) {
    var num = (req.url.substring(9));
    var ip = cid[num];
    https.get('https://api.linkedin.com/v1/companies/' + ip + '/updates?oauth2_access_token=oauth2_access_token&format=json',
        function(response) {
            var body = '';
            response.on('data', function(d) {
                body += d;
            });
            response.on('end', function() {

                // Data reception is done, do whatever with it!
                var parsed = JSON.parse(body);
                console.log('linkedin');
                res.send(parsed);
            });

        });
});

//analyse insights based on voice response using ibm
app.get('/personalityinsights', function(reqst, respns) {

            //provide url
            url = url.replace(/\//g, '%2F');
            url = url.replace(":", "%3A");
            //console.log(url);
            //https.get('https://api.idolondemand.com/1/api/async/recognizespeech/v1?url=http%3A%2F%2Fwww.talkenglish.com%2FAudioTE%2FL21%2Fsentence%2FL21S5.mp3&interval=0&apikey=f3129194-4f03-4419-80c2-f3aa041baf9a',function(res){
            https.get('https://api.idolondemand.com/1/api/async/recognizespeech/v1?url=' + url + '&apikey=apikey', function(res) {

                        var data = '';
                        res.on('data', function(d) {
                            data += d;
                        });
                        res.on('end', function(data1) {
                                    //console.log(data);
                                    data = JSON.parse(data);
                                    //console.log(data);
                                    jobID = data.jobID;
                                    https.get('https://api.idolondemand.com/1/job/result/' + jobID + '?apikey=apikey', function(res) {

                                        var dt1 = '';
                                        res.on('data', function(dt) {
                                            dt1 += dt;
                                        });
                                        res.on('end', function(dtt) {
                                            var x = (JSON.parse(dt1));
                                            var textval = (x.actions[0].result.document[0].content);


                                            var personality_insights = watson.personality_insights({
                                                "username": "username",
                                                "password": "password",
                                                version: 'v2'
                                            });

                                            personality_insights.profile({
                                                    text: textval
                                                },
                                                function(err, response) {
                                                    if (err)
                                                        console.log('error:', err);
                                                    else
                                                        console.log(JSON.stringify(response, null, 2));
                                                });
                                        });
                                    });
            });
      });
 });
                                    //call notification with questions
                                    app.get('/schedulecallnotification', function(reqst, respns) {
                                      console.log(reqst.query);
                                        clientTwilio.calls.create({
                                            to: "+1"+reqst.query.number,
                                            from: "+num",
                                            url: "fileurl",
                                            method: "GET",
                                            fallbackMethod: "GET",
                                            statusCallbackMethod: "GET",
                                            record: "false"
                                        }, function(err, call) {
                                            if (err)
                                                console.log(err);
                                            console.log('not error'+call.sid);
                                            respns.end();
                                        });

                                    });

                                    //get company info
                                    app.get('/companyInfo', function(reqst, respns) {
                                        //company website
                                        https.get('https://api.fullcontact.com/v2/company/lookup.json?domain=google.com&apiKey=apiKey',
                                            function(response) {
                                                var body = '';
                                                response.on('data', function(d) {
                                                    body += d;
                                                });
                                                response.on('end', function() {

                                                    // Data reception is done, do whatever with it!
                                                    var parsed = JSON.parse(body);
                                                    console.log('linkedin');
                                                    res.send(parsed);
                                                });

                                            });

                                    });

                                    //get student info
                                    app.get('/personInfo', function(reqst, respns) {
                                        //person email id  
                                        https.get('https://api.fullcontact.com/v2/person.json?email=bart@fullcontact.com&apiKey=apiKey',
                                            function(response) {
                                                var body = '';
                                                response.on('data', function(d) {
                                                    body += d;
                                                });
                                                response.on('end', function() {

                                                    // Data reception is done, do whatever with it!
                                                    var parsed = JSON.parse(body);
                                                    console.log('linkedin');
                                                    res.send(parsed);
                                                });

                                            });

                                    });

                                    app.listen(1337, '127.0.0.1');
