var apiKey = "DAKa8696003222b4812850342de17d0e267"; // Get from kandy.io 
var userId = "user1"; // Get from kandy.io 
var password = "1euminciduntconse1"; // Get from kandy.io 
var Kandy=require("kandy");
var kandy = new Kandy(apiKey);

var from = "+14694509830"; // Optional 
var to = "+14697672278"; // Required 
var text = "Hello from Kandy"; // Required 

var userAccessToken;
kandy.getUserAccessToken(userId, password, function (data, response) {
        var dataJson = JSON.parse(data);
        console.log(dataJson.result.user_access_token);
        userAccessToken=dataJson.result.user_access_token;


kandy=new Kandy();

//send SMS
 
kandy.sendSms(userAccessToken, from, to, text, function (data, response) {
      var dataJson = JSON.parse(data);
      console.log(dataJson);
      if (dataJson.message == "success") {
          console.log("Sent to " + to + ": " + text);
      }
});

    });

 