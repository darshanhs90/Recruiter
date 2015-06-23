$(function () {
   $(".accordion div").show();
    setTimeout("$('.accordion div').slideToggle('slow');", 1000);
    $(".accordion h3").click(function () {
    	
        $(this).next(".pane").slideToggle("slow").siblings(".pane:visible").slideUp("slow");
        $(this).toggleClass("current");
        $(this).siblings("h3").removeClass("current");
    });

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


$scope.sendaccept=function($val){
	//pass phone number
	alert('setupcall');
            $http({
    url: 'http://172.20.10.3:1337/schedulecallnotification', 
    method: "GET",
    params: {recip:$scope.rcpt,txtval: $scope.txtarra}
 }).success(function(data, status, headers, config) {

    alert(data);
    $http({
    url: 'http://172.20.10.3:1337/setupcall', 
    method: "GET",
    params: {recip:$scope.rcpt,txtval: $scope.txtarra}
 }).success(function(data, status, headers, config) {
    alert(data);
 });



 });
  };    



























});

});