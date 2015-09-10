app.controller('CuttingMethodController', function ($scope, $http, $route) {

    $scope.methods = [];
    $scope.addnew = false;
    $scope.newMethod = {};

    $http.get('/dashboard/methods').
        success(function (data, status, headers, config) {
            console.log(data);
            $scope.methods = data;
        });

    $scope.new = function () {
        $scope.addnew = true;
    }

    $scope.cancel = function () {
        $scope.addnew = false;
    }

    $scope.edit = function (method) {
        $scope.newMethod = method;
        $scope.addnew = true;
    }

    $scope.save = function () {
        $http.post('/dashboard/methods', $scope.newMethod).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

    $scope.delete = function (method) {
        $http.get('/dashboard/methods/delete/' + method.id).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

});