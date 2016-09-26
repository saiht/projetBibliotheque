var app = angular.module('app', []);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
});

app.controller('LivreController', function LivreController($scope, $http) {


    var livres = $scope.livres = [];

    $http.get('/livres')      //Envoyer le contenu du message
        .then(function (response) {
            $scope.livres = response.data;

            console.log($scope.livres);
        });

});