<!DOCTYPE html>
<html lang="en-us" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <title>Find a Babysitter</title>
    <!--<script type="text/javascript" src="assets/js/angular.min.js"></script>
    <script type="text/javascript" src="assets/js/angular-route.min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="{{URL::asset('assets/js/jquery-1.12.3.min.js')}}"></script>
<script src="{{URL::asset('assets/js/multiselect.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap/dropdown.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap/tooltip.js')}}"></script>
<script src="assets/js/bootstrap/bootstrap-tagsinput.min.js"></script>

<script type="text/javascript">
    $('[data-toggle~="tooltip"]').tooltip({ container: 'body' });
    $('[data-toggle~="dropdown"]').dropdown({ container: 'body' });
    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });
</script>
<div class="panel panel-default" ng-controller="mainController">
    <nav class = "navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#dropdown">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img class="navbar-brand" src="assets/img/logo.svg" alt="Find a Babysitter"/>
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
                        <li><a href="/jobs"><i class="fa fa-list-alt"></i> Jobs</a></li>
                    @endif
                    <!--<li><a href="#">Inbox <span class="badge">11</span></a></li>-->
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a>
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
