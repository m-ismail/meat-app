<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Qurban</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="row">
        <div class="col-md-12 text-center">
            <a href="http://www.corkmosque.org">
                <img src="http://www.corkmosque.org/uploads/3/4/1/5/3415582/1434479417.png">
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please fill out the form below to place your order for ad'dhyya ( Qurban )</h3>
                </div>
                <div class="panel-body">

                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{Session::get('error')}}
                        </div>
                    @endif

                    @if(Session::has('order'))
                        <div class="alert alert-success" role="alert">
                            Thank you, your order has been sent.<br>
                            We will contact you soon to confirm the order.
                        </div>
                    @else
                        <form action="/qurban" method="post">
                            <div class="form-group">
                                <label>Animal Type</label>
                                <select class="form-control" name="type">
                                    @foreach($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cutting Method</label>
                                <select class="form-control" name="cut">
                                    @foreach($methods as $method)
                                        <option value="{{$method->id}}">{{$method->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pick From</label>
                                <select class="form-control" name="center">
                                    @foreach($centers as $center)
                                        <option value="{{$center->id}}">{{$center->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Your Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Enter your mobile">
                            </div>
                            <button type="submit" class="btn btn-default">Send</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>