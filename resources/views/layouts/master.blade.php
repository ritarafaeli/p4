<!DOCTYPE html>
<html lang="en-us" ng-app="myApp">
<head>
    <title>Find a Babysitter</title>
    <!--AngularJS-->
    <script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script type="text/javascript" src="assets/js/angular-route.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Styling -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}">
</head>
<body>
<div class="panel panel-default" ng-controller="mainController">
    <nav class = "navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dropdown">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Find A Babysitter</a>
        </div>
        <div id="dropdown" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container body-content" ng-cloak>
        @yield('content')
    </div>
    <div class="container footer">
        <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> <b>Margarita Rafaeli</b>
    </div>
</div>

</body>
</html>
