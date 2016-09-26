var app = angular.module('app', []);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
});

app.controller('LivreController', function LivreController($scope, $http) {


    $scope.livres = [];

    $http.get('/livres')  
        .then(function (response) {
            $scope.livres = response.data;
            // console.log($scope.livres);
        });

    $scope.livresParus = [];

    $http.get('/livres/parution')
        .then(function (response) {
            $scope.livresParus = response.data;
        });



});