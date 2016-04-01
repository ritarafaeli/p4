@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="panel-group panel-primary">
        <div class="panel-heading">Register</div>
        <div class="panel-body">
            <div class='alert alert-danger' role="alert" ng-show="errors">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Please correct the form errors below and try again.
            </div>
            <form method='POST' action='/register'>
                {!! csrf_field() !!}
                <div class='form-group'>
                    <label>Name</label>
                    <input type='text' name='name' id='name' value='{{ old('name') }}'>
                </div>
                <div class='form-group'>
                    <label>Email</label>
                    <input type='text' name='email' id='email' value='{{ old('email') }}'>
                </div>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='password' id='password'>
                </div>
                <div class='form-group'>
                    <label>Confirm Password</label>
                    <input type='password' name='password_confirmation' id='password_confirmation'>
                </div>
                <button type='submit' class='btn btn-primary'>Register</button>
            </form>
        </div>
        <div class="panel-footer">
            <p>Already have an account? <a href='/login'>Login here</a></p>
        </div>
    </div>

@stop