app.controller('OrderController', function ($scope, $http, $route) {

    $scope.orders = [];
    $scope.modelStatus = [
        {value: 'confirmed', name: 'Confirmed'},
        {value: 'cancelled', name: 'Cancelled'},
        {value: 'delivered', name: 'Delivered'},
    ];

    $http.get('/dashboard/orders').
        success(function (data, status, headers, config) {
            console.log(data);
            $scope.orders = data;
        });

    $scope.updateStatus = function (order, status) {
        $http.get('/dashboard/orders/' + order.id + '/' + status).
            success(function (data, status, headers, config) {
                console.log(data);
                $route.reload();
            });
    }

});