// Twilio Credentials 
var accountSid = 'id'; 
var authToken = 'token'; 
 
//require the Twilio module and create a REST client 
var clientTwilio = require('twilio')(accountSid, authToken); 
 
clientTwilio.calls.create({ 
	to: "+14697672278", 
	from: "+14694164117", 
	url: "https://www.dropbox.com/s/3nsmfduffri1lg5/twilio.xml",  
	method: "GET",  
	fallbackMethod: "GET",  
	statusCallbackMethod: "GET",    
	record: "false" 
}, function(err, call) { 
	if(err)
		console.log(err);
	console.log(call.sid); 
});
