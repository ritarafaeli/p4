@extends('layouts.master')

@section('content')

    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="panel panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Account</div>
        <div class="panel-body">
            <form method='POST' action='/account' enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Profile Picture:</label><br>
                    <div class="col-sm-10">
                    @if(Auth::user()->profile_picture !== null)
                        <img id="photo" width="150" height="150"  class="img-thumbnail img-left" src="{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }}">
                    @else
                        <img id="photo" width="150" height="150" class="img-thumbnail img-left" src="{{URL::asset('assets/img/default_profile_avatar.jpg')}}" alt="">
                    @endif
                        <input type="file" name="profile_picture" onchange="document.getElementById('photo').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Name:</label>
                    <div class="col-sm-10">
                        <input type='text' name="name" value="{{ Auth::user()->name }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Email:</label>
                    <div class="col-sm-10">
                        <span>{{ Auth::user()->email }}</span>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Account Type:</label>
                    <div class="col-sm-10">
                        <span>{{ Auth::user()->is_parent ? "Parent/Guardian" : "Caregiver" }}</span>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Old Password:</label>
                    <div class="col-sm-10">
                        <input type='password' name="old_password">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">New Password:</label>
                    <div class="col-sm-10">
                        <input type='password' name="new_password">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Confirm New Password:</label>
                    <div class="col-sm-10">
                        <input type='password' name="confirm_password">
                    </div>
                </div>
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop