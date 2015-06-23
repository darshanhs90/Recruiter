var AlchemyAPI = require('alchemy-api');
var alchemy = new AlchemyAPI('7b6bf4773c39c9e271f6bd999fea5df5179a6dad');
var data="Hi How are you?"
alchemy.sentiment(data, {}, function(err, response) {
  if (err) throw err;

  var sentiment = response.docSentiment;
  console.log(sentiment);
  //asd=sentiment;
  //res.send(asd);
});