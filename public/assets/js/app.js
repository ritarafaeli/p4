var myApp = angular.module('myApp', ['ngRoute']);

myApp.controller('mainController', ['$scope', '$location', '$log', '$routeParams', '$http', function($scope, $location, $log, $routeParams, $http) {

    $scope.numParagraphs = 3; //number of initial paragraphs setup in form
    $scope.num = 3; //number of randomusers to generate, default set to 3
    $scope.errors; //error response from random user post requests
    $scope.errorsLipsum; //error response from lipsum post requests
    $scope.paragraphs; //loremipsum json
    $scope.users; //randomuser json

    //sends post request to the loremipsum route
    $scope.generateParagraphs = function() {
        $scope.errorsLipsum = "";
        $http.post('loremipsum/post', {
                numParagraphs: $scope.numParagraphs
            })
            .success(function(response) {
                $scope.paragraphs = response;
            }).error(function(response) {
                $scope.errorsLipsum = response;
            }
        );
    }

    //sends post request to generate and download xls for lipsum paragraphs
    $scope.downloadLipsumParagraphs = function() {
        $http({
            url: 'loremipsum/download',
            method: 'POST',
            responseType: 'arraybuffer',
            data: {
                paragraphs: $scope.paragraphs
            },
            headers: {
                'Content-type': 'application/json',
            }
        }).success(function(data){
            var blob = new Blob([data], {
                type: "text/csv;charset=utf-8;"
            });
            saveAs(blob, 'LipsumParagraphs' + '.csv');
        }).error(function(response){
        });
    }

    //sends post request to generate and download xls for random users
    $scope.downloadRandomUsers = function() {
        $http({
            url: 'randomuser/download',
            method: 'POST',
            responseType: 'arraybuffer',
            data: {
                users: $scope.users
            },
            headers: {
                'Content-type': 'application/json',
            }
        }).success(function(data){
            var blob = new Blob([data], {
                type: "text/csv;charset=utf-8;"
            });
            saveAs(blob, 'RandomUsers' + '.csv');
        }).error(function(){
        });
    }

    //sends post request to the randomuser route
    $scope.generateUsers = function(){
        $scope.errors = "";
        $http.post('randomuser/post', {
                num : $scope.num,
                birthday : $scope.birthday,
                profile : $scope.profile,
                email : $scope.email
            })
            .success(function(response) {
                $scope.users = response;

            }).error(function(response) {
                $scope.errors = response;
            }
        );
    }

    //default tab is set to the welcome blurb
    $scope.tab = 0;

    //sets the selected tab
    $scope.setTab = function (tabId) {
        this.tab = tabId;
    };

    //boolean returns whether that tab is selected
    $scope.isSet = function (tabId) {
        return this.tab === tabId;
    };

}]);
