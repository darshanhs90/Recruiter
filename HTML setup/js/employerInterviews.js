var app=angular.module("myApp",['ui.calendar']);
app.controller("MainController",function($scope,$http){
    var events=[
      {title:"Interview Candidate A",start:new Date(2015,22,6)},
      {title:"Shortlist Students",start:new Date(2015,6,22,18,30),end:new Date(2015,1,14,14,30),allDay:false},
      {title:"QR Scanning Day",start:new Date(2015,15,6),end:new Date(2015,23,1)}
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

$http.post('./php/employerDashboard.php')
                    .success(function(data, status, headers, config) {
                     // alert(data);
                            $scope.dashboardData=data;
                    }).error(function(data, status) { 
                        alert("Error While Fetching Data,Try Again");
                    });  
});