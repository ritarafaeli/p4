@extends('layouts.master')

@section('content')



    <div class="well col-xs-7">
        <div class="panel-group panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Register</div>
            <div class="panel-body">
            @if(count($errors) > 0)
                <ul class="fa-ul error">
                    @foreach ($errors->all() as $error)
                        <li><i class="fa fa-li fa-exclamation-circle" aria-hidden="true"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
                <form method='POST' action='/register'>
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user" title="Full Name" data-toggle="tooltip" data-placement="left"></i></span>
                        <input name='name' class="form-control" type="text" placeholder="Name" value='{{ old('name') }}'>
                    </div>
                    <div class='input-group'>
                        <span class="input-group-addon"><i class="fa fa-user" title="Account Type" data-toggle="tooltip" data-placement="left"></i></span>
                        <select class="form-control" name='is_parent'>
                            <option value='1'>Parent/Guardian</option>
                            <option value='0'>Caregiver</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" title="Email Address" data-toggle="tooltip" data-placement="left"></i></span>
                        <input name='email' class="form-control" type="text" placeholder="Email Address" value='{{ old('email') }}'>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk" title="Password" data-toggle="tooltip" data-placement="left"></i></span>
                        <input name='password' class="form-control" type="password" placeholder="Password" value='{{ old('password') }}'>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-asterisk" title="Retype Password" data-toggle="tooltip" data-placement="left"></i></span>
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