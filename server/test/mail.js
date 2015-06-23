var inbox = require("inbox");
var client = inbox.createConnection(false, "imap.gmail.com", {
    secureConnection: true,
    auth:{
        user: "hsdars@gmail.com",
        pass: "rashmidell"
    }
});
client.connect();

client.on("connect", function(){
    console.log("Successfully connected to server");
});
client.listMessages(-10, function(err, messages){
    messages.forEach(function(message){
        console.log(message.UID + ": " + message.title);
    });
});