var onloadCallback = function () {
    widgetId1 = grecaptcha.render('example1', {
        'sitekey': '6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI',
        'theme': 'light'
    });
};

var app = angular.module('app', []);
// Construction de l'url vars l'api Rest de Users
var urlToRestApiUsers = urlToRestApi.substring(0, urlToRestApi.lastIndexOf('/') + 1) + 'users';

app.controller('KrajRegionCrudJwtCtrl', ['$scope', 'KrajRegionCrudJwtService', function ($scope, KrajRegionCrudJwtService) {

        $scope.updateKrajRegion = function () {
            KrajRegionCrudJwtService.updateKrajRegion($scope.krajRegion.id, $scope.krajRegion.nazev, $scope.krajRegion.kod)
                    .then(function success(response) {
                        $scope.message = 'KrajRegion data updated!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error updating krajRegion!';
                                $scope.message = '';
                            });
        }

        $scope.getKrajRegion = function () {
            var id = $scope.krajRegion.id;
            KrajRegionCrudJwtService.getKrajRegion($scope.krajRegion.id)
                    .then(function success(response) {
                        $scope.krajRegion = response.data.krajRegion;
//                        $scope.krajRegion.id = id;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                if (response.status === 404) {
                                    $scope.errorMessage = 'KrajRegion not found!';
                                } else {
                                    $scope.errorMessage = "Error getting krajRegion!";
                                }
                            });
        }

        $scope.addKrajRegion = function () {
            if ($scope.krajRegion != null && $scope.krajRegion.nazev) {
                KrajRegionCrudJwtService.addKrajRegion($scope.krajRegion.nazev, $scope.krajRegion.kod)
                        .then(function success(response) {
                            $scope.message = 'KrajRegion added!';
                            $scope.errorMessage = '';
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Error adding krajRegion!';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Please enter a name!';
                $scope.message = '';
            }
        }

        $scope.deleteKrajRegion = function () {
            KrajRegionCrudJwtService.deleteKrajRegion($scope.krajRegion.id)
                    .then(function success(response) {
                        $scope.message = 'KrajRegion deleted!';
                        $scope.krajRegion = null;
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Error deleting krajRegion!';
                                $scope.message = '';
                            })
        }

        $scope.getAllKrajRegions = function () {
            KrajRegionCrudJwtService.getAllKrajRegions()
                    .then(function success(response) {
                        $scope.krajRegions = response.data.krajRegions;
                        $scope.message = '';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.message = '';
                                $scope.errorMessage = 'Error getting krajRegions!';
                            });
        }
        $scope.login = function () {
            if (grecaptcha.getResponse(widgetId1) == '') {
                $scope.captcha_status = 'Please verify captha.';
                return;
            }
            if ($scope.user != null && $scope.user.username) {
                KrajRegionCrudJwtService.login($scope.user)
                        .then(function success(response) {
                            $scope.message = $scope.user.username + ' en session!';
                            $scope.errorMessage = '';
                            localStorage.setItem('token', response.data.data.token);
                            localStorage.setItem('user_id', response.data.data.id);
                        },
                                function error(response) {
                                    $scope.errorMessage = 'Nom d\'utilisateur ou mot de passe invalide...';
                                    $scope.message = '';
                                });
            } else {
                $scope.errorMessage = 'Entrez un nom d\'utilisateur s.v.p.';
                $scope.message = '';
            }

        }
        $scope.logout = function () {
            localStorage.setItem('token', "no token");
            localStorage.setItem('user', "no user");
            $scope.message = '';
            $scope.errorMessage = 'Utilisateur déconnecté!';
        }
        $scope.changePassword = function () {
            KrajRegionCrudJwtService.changePassword($scope.user.password)
                    .then(function success(response) {
                        $scope.message = 'Mot de passe mis à jour!';
                        $scope.errorMessage = '';
                    },
                            function error(response) {
                                $scope.errorMessage = 'Mot de passe inchangé!';
                                $scope.message = '';
                            });
        }
    }]);

app.service('KrajRegionCrudJwtService', ['$http', function ($http) {

        this.getKrajRegion = function getKrajRegion(krajRegionId) {
            return $http({
                method: 'GET',
                url: urlToRestApi + '/' + krajRegionId,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")}
            });
        }

        this.addKrajRegion = function addKrajRegion(nazev, kod) {
            return $http({
                method: 'POST',
                url: urlToRestApi,
                data: {nazev: nazev, kod: kod},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            });
        }

        this.deleteKrajRegion = function deleteKrajRegion(id) {
            return $http({
                method: 'DELETE',
                url: urlToRestApi + '/' + id,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.updateKrajRegion = function updateKrajRegion(id, nazev, kod) {
            return $http({
                method: 'PATCH',
                url: urlToRestApi + '/' + id,
                data: {nazev: nazev, kod: kod},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }

        this.getAllKrajRegions = function getAllKrajRegions() {
            return $http({
                method: 'GET',
                url: urlToRestApi,
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }

        this.login = function login(user) {
            return $http({
                method: 'POST',
                url: urlToRestApiUsers + '/token',
                data: {username: user.username, password: user.password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'}
            });
        }
        this.changePassword = function changePassword(password) {
            return $http({
                method: 'PATCH',
                url: urlToRestApiUsers + '/' + localStorage.getItem("user_id"),
                data: {password: password},
                headers: {'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'Authorization': 'Bearer ' + localStorage.getItem("token")
                }
            })
        }
    }]);


