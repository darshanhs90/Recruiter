/**
 * Created by darshan on 3/16/2015.
 */
 var app = angular.module('myApp', []);




    
    app.controller('myCtrl', function($scope, $http) {


            $http.post('../callingPage.php')
                .success(function(data, status, headers, config) {
                    alert(data);
                    //$scope.profiles = data;
                }).error(function(data, status) {
                    alert("Error While Fetching Data,Try Again");
                });
/*
            $scope.setupcall = function($val) {
                //pass phone number
                var txtval='You have been shortlisted by '+$scope.profiles[$val].remail;
                $http({
                    url: 'http://127.0.0.1:1337/schedulecallnotification',
                    method: "GET",
                    params: {
                        number: $scope.profiles[$val].pnumber
                    }
                }).success(function(data, status, headers, config) {
                        alert(data);

                    $http({
                        url: 'http://127.0.0.1:1337/sendSms',
                        method: "GET",
                        params: {
                            number: $scope.profiles[$val].pnumber,
                            txtval: txtval
                        }
                    }).success(function(data, status, headers, config) {
                        alert(data);
                        

                        $http({
                        url: 'http://127.0.0.1:1337/sendMail',
                        method: "GET",
                        params: {
                            number: $scope.profiles[$val].email,
                            txtval:txtval
                        }
                    }).success(function(data, status, headers, config) {
                        alert(data);
                    });

                 });

            });

        };



            $scope.analyse = function($val) {
                //pass mp3 link
                alert('analyse');


                $http({
                    url: 'http://127.0.0.1:1337/personalityinsights',
                    method: "GET",
                    params: {
                        recip: $scope.rcpt,
                        txtval: $scope.txtarra
                    }
                }).success(function(data, status, headers, config) {
                    alert(data);
                });
            };






            $scope.shortlist = function($val) {
                //pass email 
                alert('shortlist');


                $http.post('./php/shortlist.php')
                    .success(function(data, status, headers, config) {
                        $scope.profiles = data;
                        $http({
                            url: 'http://127.0.0.1:1337/sendMail',
                            method: "GET",
                            params: {
                                recip: $scope.rcpt,
                                txtval: $scope.txtarra
                            }
                        }).success(function(data, status, headers, config) {
                            alert(data);
                        });


                        $http({
                            url: 'http://127.0.0.1:1337/sendSMS',
                            method: "GET",
                            params: {
                                recip: $scope.rcpt,
                                txtval: $scope.txtarra
                            }
                        }).success(function(data, status, headers, config) {
                            alert(data);
                        });

                    }).error(function(data, status) {
                        alert("Error While Fetching Data,Try Again");
                    });
        };








            $scope.reject = function($val) {
                //pass email 
                alert('reject');
                $http.post('./php/reject.php')
                    .success(function(data, status, headers, config) {
                        $scope.profiles = data;
                        $http({
                            url: 'http://127.0.0.1:1337/sendMail',
                            method: "GET",
                            params: {
                                recip: $scope.rcpt,
                                txtval: $scope.txtarra
                            }
                        }).success(function(data, status, headers, config) {
                            alert(data);
                        });
                    }).error(function(data, status) {
                        alert("Error While Fetching Data,Try Again");
                    });

                //send mail no
            };



            $('#pdfViewer').hide();
             $scope.resume = function($val) {
                //pass email 
                alert('resume');
                $('#pdfViewer').show();
            };
    */
});