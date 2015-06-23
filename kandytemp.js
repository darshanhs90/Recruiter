var apiKey = "API_KEY"; // Get from kandy.io 
var userId = "USER_ID"; // Get from kandy.io 
var password = "USER_PASSWORD"; // Get from kandy.io 
 
var kandy = new Kandy(apiKey);
 
kandy.getUserAccessToken(userId, password, function (data, response) {
        var dataJson = JSON.parse(data);
        console.log(dataJson);
    });
});
 
Send SMS
var userAccessToken = "USER_ACCESS_TOKEN"; // Get from kandy.getUserAccessToken(...) 
 
var from = "+1-408-475-****"; // Optional 
var to = "+1-408-475-****"; // Required 
var text = "Hello from Kandy"; // Required 
 
var kandy = new Kandy();
 
kandy.sendSms(userAccessToken, from, to, text, function (data, response) {
      var dataJson = JSON.parse(data);
      if (dataJson.message == "success") {
          console.log("Sent to " + to + ": " + text);
      }
});
 
Send Message
var userAccessToken = "USER_ACCESS_TOKEN"; // Get from kandy.getUserAccessToken(...) 
 
var to = "user2@domain.com"; // Required 
var text = "Hello from Kandy"; // Required 
 
var kandy = new Kandy();
 
kandy.sendIm(userAccessToken, to, text, function (data, response) {
      var dataJson = JSON.parse(data);
      if (dataJson.message == "success") {
          console.log("Sent to " + to + ": " + text);
      }
});
 
Get Messages
var userAccessToken = "USER_ACCESS_TOKEN"; // Get from kandy.getUserAccessToken(...) 
 
var autoClear = true; // Clear messages after receiving so that next call won't show those messages 
 
var kandy = new Kandy();
 
kandy.getIm(userAccessToken, autoClear, function (data, response) {
      var dataJson = JSON.parse(data);
      console.log(dataJson);
});
 
Get Addressbook
var userAccessToken = "USER_ACCESS_TOKEN"; // Get from kandy.getUserAccessToken(...) 
 
var kandy = new Kandy();
 
kandy.getAddressbook(userAccessToken, function (data, response) {
      var dataJson = JSON.parse(data);
      console.log(dataJson);
});
 
Get Domain Access Token
var apiKey = "API_KEY"; // Get from kandy.io 
var domainApiSecret = "DOMAIN_API_SECRET"; // Get from kandy.io 
 
var kandy = new Kandy(apiKey, domainApiSecret);
 
kandy.getDomainAccessToken(function (data, response) {
      var dataJson = JSON.parse(data);
      console.log(dataJson);
});
 
Get List Users
var domainAccessToken = "DOMAIN_ACCESS_TOKEN"; // Get from kandy.getDomainAccessToken(...) 
 
var kandy = new Kandy();
 
kandy.getListUsers(domainAccessToken, function (data, response) {
      var dataJson = JSON.parse(data);
      console.log(dataJson);
});
