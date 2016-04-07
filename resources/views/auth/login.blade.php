@extends('layouts.master')

@section('content')

    <div class="well well-lg col-xs-6">
        <div class="row">
            <div class="col-xs-12"><h3>Login</h3></div>
        </div>
        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method='POST' action='/login'>
            {!! csrf_field() !!}
            <div class="input-group margin-bottom-sm">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input name='email' class="form-control" type="text" placeholder="Email address" value='{{ old('email') }}'>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                <input name='password' class="form-control" type="password" placeholder="Password" value='{{ old('password') }}'>
            </div>
            <div class='form-group'>
                <input type='checkbox' name='remember' id='remember'>
                <label for='remember' class='checkboxLabel'>Remember me</label>
            </div>
            <div class='form-group'>
                <button type='submit' class='btn btn-primary'>Login</button>
            </div>
        </form>
        <h5>Don't have an account? <a href='/register'>Register here...</a></h5>
    </div>
@stop