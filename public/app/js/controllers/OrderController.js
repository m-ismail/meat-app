app.controller('OrderController', function($scope,$http){

    $scope.orders = [];

    $http.get('/dashboard/orders').
        success(function(data, status, headers, config) {
            console.log(data);
            $scope.orders = data;
        });

    $scope.show = function(order){
        $http.get('/api/pooloption/addvote/'+ pooloptions.id).
            success(function(data, status, headers, config) {
                pooloptions.vote++;
            });
    }

});