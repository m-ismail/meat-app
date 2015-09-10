var app = angular.module('meatApp', ['ngRoute']);

app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
            when('/', {
                redirectTo: '/orders'
            }).
            when('/orders', {
                templateUrl: '/app/views/orders/index.html',
                controller: 'OrderController'
            }).
            when('/types', {
                templateUrl: '/app/views/types/index.html',
                controller: 'AnimalTypeController'
            }).
            when('/methods', {
                templateUrl: '/app/views/methods/index.html',
                controller: 'CuttingMethodController'
            }).
            when('/centers', {
                templateUrl: '/app/views/centers/index.html',
                controller: 'DistCentersController'
            }).
            otherwise({
                redirectTo: '/orders'
            });
    }]);


app.directive('bsActiveLink', ['$location', function ($location) {
    return {
        restrict: 'A', //use as attribute
        replace: false,
        link: function (scope, elem) {
            //after the route has changed
            scope.$on("$routeChangeSuccess", function () {
                var hrefs = ['/#' + $location.path(),
                    '#' + $location.path(), //html5: false
                    $location.path()]; //html5: true
                angular.forEach(elem.find('a'), function (a) {
                    a = angular.element(a);
                    if (-1 !== hrefs.indexOf(a.attr('href'))) {
                        a.parent().addClass('active');
                    } else {
                        a.parent().removeClass('active');
                    }
                    ;
                });
            });
        }
    }
}]);

