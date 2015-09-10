var app =  angular.module('meatApp',['ngRoute']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/orders', {
                templateUrl: '/app/views/orders/index.html',
                controller: 'OrderController'
            }).
            otherwise({
                redirectTo: '/'
            });
    }]);