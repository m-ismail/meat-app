app.controller('DistCentersController', function ($scope, $http, $route) {

    $scope.centers = [];
    $scope.addnew = false;
    $scope.newCenter = {};

    $http.get('/dashboard/centers').
        success(function (data, status, headers, config) {
            console.log(data);
            $scope.centers = data;
        });

    $scope.new = function () {
        $scope.addnew = true;
    }

    $scope.cancel = function () {
        $scope.addnew = false;
    }

    $scope.edit = function (center) {
        $scope.newCenter = center;
        $scope.addnew = true;
    }

    $scope.save = function () {
        $http.post('/dashboard/centers', $scope.newCenter).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

    $scope.delete = function (center) {
        $http.get('/dashboard/centers/delete/' + center.id).
            success(function (data, status, headers, config) {
                $route.reload();
            });
    }

});