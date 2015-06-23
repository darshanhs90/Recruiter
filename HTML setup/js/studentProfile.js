var app=angular.module('myApp',[]);
app.controller('myCtrl',function($scope,$http) {

$scope.txtarra=$scope.txtarra.replace(' #','23');

$http({
    url: 'http://172.20.10.3:1337/postmultstat', 
    method: "GET",
    params: {recip:$scope.rcpt,txtval: $scope.txtarra}
 }).success(function(data, status, headers, config) {
    alert(data);
 });


});