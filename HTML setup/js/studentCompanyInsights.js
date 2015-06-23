var app=angular.module('myApp',[]);
app.controller('myCtrl',function($scope,$http) {

$scope.txtarra=$scope.txtarra.replace(' #','23');
function changePlaceholder() {
          
          // create our list of different placeholders we'll use
          var placeHolders = new Array();
          placeHolders[0] = "Search for Google";
          placeHolders[1] = "Search for Microsoft";
          placeHolders[2] = "Search for Facebook";
          
          // x will be our counter for what placeholder we're currently showing
          var x = 0;
          
          // change the placeholder to the current number of our counter
          $('#searchBox').attr('placeholder', placeHolders[x]);

          // increase the counter
          x++;
       
          // if we've hit the last placeholder then start over
          if(x >= placeHolders.length) {
               x = 0;
          }
       
          // run this function again in 3 seconds to keep the loop going   
          setTimeout(changePlaceholder, 1000);
     }
     
     // start running the changePlaceholder function after 3 seconds
     t = setTimeout(changePlaceholder, 1000);
$http({
    url: 'http://172.20.10.3:1337/postmultstat', 
    method: "GET",
    params: {recip:$scope.rcpt,txtval: $scope.txtarra}
 }).success(function(data, status, headers, config) {
    alert(data);
 });


});


