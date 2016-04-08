@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> <div class="error">{{ $error }}</div></li>
            @endforeach
        </ul>
    @endif

    <div class="well col-xs-7">
        <div class="panel-group panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</div>
            <div class="panel-body">
                <div class='alert alert-danger' role="alert" ng-show="errors">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    Please correct the form errors below and try again.
                </div>
                <form method='POST' action='/register'>
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name='name' class="form-control" type="text" placeholder="Name" value='{{ old('name') }}'>
                    </div>
                    <div class='input-group'>
                        <span class="input-group-addon"><i class="fa fa-user" title="Account Type"></i></span>
                        <select class="form-control" name='is_parent'>
                            <option value='1'>Parent/Guardian</option>
                            <option value='0'>Caregiver</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name='email' class="form-control" type="text" placeholder="Email address" value='{{ old('email') }}'>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <input name='password' class="form-control" type="password" placeholder="Password" value='{{ old('password') }}'>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        <input name='password_confirmation' class="form-control" type="password" placeholder="Confirm Password">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type='submit' class='btn btn-primary'>Register</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <h5>Already have an account? <a href='/login'>Login here</a></h5>
            </div>
        </div>
    </div>
@stop