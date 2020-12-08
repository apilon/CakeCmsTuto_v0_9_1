var app = angular.module('linkedlists', []);

app.controller('krajRegionsController', function ($scope, $http) {
    // l'url vient de add.ctp
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.krajRegions = response.data.krajRegions;
    });
});

