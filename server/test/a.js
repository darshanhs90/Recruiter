var https=require('https');
https.get('https://api.linkedin.com/v1/companies/1441/updates?oauth2_access_token=AQUxHxrW_VKxyQoipBT3-37W7cj3NJhF0LLmGARZvGX2hziIY9gdy8HEdaZHTGLPuo8T8mHdD0X64HEZIQeSL-6mj8hMLAGPH2IuZAwi8HF_6sFe7sM79r0q1wxyxZpCXcT_M8gicNIieekmGegFpHp8H-UqjPnTLwWNKUd1HI4taXVbbdg&format=json',
	function(response){
	 var body = '';
        response.on('data', function(d) {
            body += d;
        });
		response.on('end', function() {

            // Data reception is done, do whatever with it!
            var parsed = JSON.parse(body);
            console.log(parsed)
        });

});