@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> <div class="error">{{ $error }}</div></li>
            @endforeach
        </ul>
    @endif

    <div class="panel-group panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</div>
        <div class="panel-body">
            <div class='alert alert-danger' role="alert" ng-show="errors">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                Please correct the form errors below and try again.
            </div>
            <form method='POST' action='/register'>
                {!! csrf_field() !!}
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type='text' name='name' id='name' value='{{ old('name') }}'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Account Type</label>
                    <div class="col-sm-4">
                        <select class="form-control" name='is_parent'>
                            <option value='1'>Parent/Guardian</option>
                            <option value='0'>Caregiver</option>
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type='text' class="form-control" name='email' id='email' value='{{ old('email') }}'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-4">
                        <input class="form-control" type='password' name='password' id='password'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Confirm Password</label>
                    <div class="col-sm-4">
                        <input class="form-control" type='password' name='password_confirmation' id='password_confirmation'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type='submit' class='btn btn-primary'>Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <p>Already have an account? <a href='/login'>Login here</a></p>
        </div>
    </div>

@stop