var http=require('http');

var options={
'url':'https://www.linkedin.com/uas/oauth2/authorization',
'response_type':'code',
'client_id':'77brodmcvv1hrg',
'redirect_uri':'https://www.example.com/auth/linkedin',
'state':'DCEeFWf45A53sdfKasdgr'
}
http.get(options,function(res){
	console.log(res.client._httpMessage.res);
})