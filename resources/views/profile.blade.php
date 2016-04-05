@extends('layouts.master')

@section('content')
    <div class="panel-group panel-primary">
        <div class="panel-heading">My Profile</div>
        <div class="panel-body">
            <form method='POST' action='/profile'>
                {{ csrf_field() }}
                <div class='form-group'>
                    <label>Bio:</label>
                    <input type='text' name="bio" value="{{ isset($caregiver->$bio) ? $caregiver->$bio : }}">
                </div>
                <div class='form-group'>
                    <label>Smoker:
                        <input type='checkbox' ng-model='birthday'>
                    </label>
                </div>
                <div class='form-group'>
                    <label>Driver:
                        <input type='checkbox' ng-model='profile'>
                    </label>
                </div>
                <div class='form-group'>
                    <label>Email:
                        <input type='email'>
                    </label>
                </div>
                <button type='submit' class="btn btn-primary">Generate</button>
            </form>
        </div>
    </div>
@stop