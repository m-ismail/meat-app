app.controller('AnimalTypeController', function ($scope, $http, $route) {

    $scope.types = [];
    $scope.addnew = false;
    $scope.newType = {};

    $http.get('/dashboard/types').
        success(function (data, status, headers, config) {
            console.log(data);
            $scope.types = data;
        });

    $scope.new = function () {
        $scope.addnew = true;
    }

    $scope.cancel = function () {
        $scope.addnew = false;
    }

    $scope.edit = function (type) {
        $scope.newType = type;
        $scope.addnew = true;
    }

    $scope.save = function () {
        $http.post('/dashboard/types', $scope.newType).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

    $scope.delete = function (type) {
        $http.get('/dashboard/types/delete/' + type.id).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

});