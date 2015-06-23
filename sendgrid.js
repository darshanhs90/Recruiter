var sendgrid  = require('sendgrid')('hsdars', 'Darshanhs90-');
sendgrid.send({
  to:       'hsdars@gmail.com',
  from:     'hsdars@gmail.com',
  subject:  'Hello World',
  text:     'My first email through SendGrid.'
}, function(err, json) {
  if (err) { return console.error(err); }
  console.log(json);
});