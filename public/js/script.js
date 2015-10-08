var app = angular.module('myApp', []);

app.config(['$interpolateProvider', function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
}]);

app.controller('controller', function(
    $scope, $http, $interval, $log, $anchorScroll, $location) {

    $scope.message = "Hello, World!";

    var onUserComplete = function(response) {
        $scope.user = response.data;
        $http.get($scope.user.repos_url)
            .then(onRepos, onError)
    };

    var onRepos = function(response){
        $scope.repos = response.data;
        $location.hash("userDetails");
        $anchorScroll();
    };

    var onError = function(reason){
        $scope.error = "could not fetch data";
    };

    var decrementCountdown = function() {
        $scope.countdown -= 1;
        if($scope.countdown < 1) {
            $scope.search($scope.username);
        }
    };

    var countdownInterval = null;
    var startCountdown = function() {
        countdownInterval = $interval(decrementCountdown, 1000, $scope.countdown);
    }

    $scope.search = function(username){

        $http.get("https://api.github.com/users/" + username)
            .then(onUserComplete, onError);
        $log.info("searching for " + username);

        if(countdownInterval) {
            $interval.cancel(countdownInterval);
            $scope.countdown = null;
        }
    };

    $scope.username = 'angular';
    $scope.repoSortOrder = "-stargazers_count";
    $scope.countdown = 5;
    startCountdown();

});
