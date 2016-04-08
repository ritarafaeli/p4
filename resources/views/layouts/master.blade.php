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
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Styling -->
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $("body").tooltip({ selector: '[data-toggle=tooltip]' });
        });
    </script>

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
            <a href="/" class="navbar-brand"><i class="fa fa-home"></i> Home</a>
        </div>
        <div id="dropdown" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                    <li><a href="/account"><i class="fa fa-cog"></i> My Account</a></li>
                    @if(Auth::user()->is_parent)
                        <li><a href="/caregivers"><i class="fa fa-users"></i> Caregivers</a></li>
                        <li><a href="/jobs/all"><i class="fa fa-list-alt"></i> My Jobs</a></li>
                        <li><a href="/newjob"><i class="fa fa-plus-circle"></i> New Job</a></li>
                    @else
                        <li><a href="/profile">My Profile</a></li>
                        <li><a href="/jobs">Jobs</a></li>
                    @endif
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                @else
                    <li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
                    <li><a href="/register"><i class="fa fa-plus-square"></i> Register</a></li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container body-content" ng-cloak>
        @yield('content')
    </div>
    <div class="container footer">

    </div>
</div>

</body>
</html>
