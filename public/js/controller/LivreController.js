var app = angular.module('app', []);

app.config(function ($interpolateProvider) {
    $interpolateProvider.startSymbol('//');
    $interpolateProvider.endSymbol('//');
});

app.controller('LivreController', function LivreController($scope, $http, $interval) {


    var livres = $scope.livres = [];

    function areDifferentByIds(a, b) {
        var idA = a.map( function (x) { return x.id;}).sort();
        var idB = b.map( function (x) { return x.id;}).sort();
        return (idA.join(',') !== idB.join(','));
    }

    $interval(function() {
        $http.get('/livres')      //Envoyer le contenu du message
            .then(function (response) {
                if (areDifferentByIds($scope.livres, response.data)) {
                    $scope.livres = response.data;
                }
            });
    }, 500);

});