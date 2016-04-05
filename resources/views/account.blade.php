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
        <div class="panel-heading"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> My Account</div>
        <div class="panel-body">
            <form method='POST' action='/account'>
                {{ csrf_field() }}
                <div class='form-group'>
                    <label>Profile Picture:</label><br>
                    @if(Auth::user()->profile_picture != null)
                        <img class="img-thumbnail img-left" src="{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }}">
                    @else
                        <a href="/uploadphoto"><img class="img-thumbnail img-left" src="http://placehold.it/150x150" alt="Upload Photo"></a>
                    @endif
                </div>
                <div class='form-group'>
                    <label>Name:</label>
                    <input type='text' name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class='form-group'>
                    <label>Email:</label>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <div class='form-group'>
                    <label>Account Type:</label>
                    <span>{{ Auth::user()->is_parent ? "Parent/Guardian" : "Caregiver" }}</span>
                </div>
                <div class='form-group'>
                    <label>Old Password:</label>
                    <input type='password' name="old_password">
                </div>
                <div class='form-group'>
                    <label>New Password:</label>
                    <input type='password' name="new_password">
                </div>
                <div class='form-group'>
                    <label>Confirm New Password:</label>
                    <input type='password' name="confirm_password">
                </div>
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop