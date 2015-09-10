<!DOCTYPE html>
<html lang="en">
<head>
    <!--Angulare -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular-route.js"></script>
    <!--Applicazione -->
    <script src="/app/app.js"></script>
    <script src="/app/js/controllers/OrderController.js"></script>
    <script src="/app/js/controllers/AnimalTypeController.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body ng-app="meatApp">
<div class="container">
    <hr>
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills" bs-active-link>
                <li role="presentation" class="active"><a href="#/orders">Orders</a></li>
                <li role="presentation"><a href="#/types">Animals types</a></li>
                <li role="presentation"><a href="#/methods">Cutting methods</a></li>
                <li role="presentation"><a href="#/centers">Distribution centers</a></li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <ng-view></ng-view>
        </div>
    </div>
</div>
</body>
</html>