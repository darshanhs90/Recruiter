'use strict';

var watson = require('watson-developer-cloud');

var tradeoff_analytics = watson.tradeoff_analytics({
  username: '1a4e2a43-2a65-4e28-b9bc-2947c6a48e47',
  password: 'WNMkUbFzLf6c',
  version: 'v1'
});

// From file
var params = require('C:/Users/darshan/Documents/GitHub/IBM-Hack/problem.json');

tradeoff_analytics.dilemmas(params, function(err, res) {
  if (err)
    console.log(err);
  else
    console.log(JSON.stringify(res, null, 2));
});
