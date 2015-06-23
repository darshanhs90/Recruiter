var app=angular.module("myApp",['ui.calendar']);
app.controller("MainController",function($scope){
    var events=[
      {title:"Mom's Birthday",start:new Date(2015,22,6)},
      {title:"Anniversary Party",start:new Date(2015,1,12,18,30),end:new Date(2015,1,14,14,30),allDay:false},
      {title:"Business Conference",start:new Date(2015,15,1),end:new Date(2015,23,1)}
      ];
    $scope.eventSources=[events];
    $scope.calOptions={
      editable:true,
      header:{
        left:'prev',
        center:'title',
        right:'next'
      }
    };
});