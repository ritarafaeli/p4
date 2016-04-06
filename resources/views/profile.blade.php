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
        <div class="panel-heading">My Profile</div>
        <div class="panel-body">
            <form method='POST' action='/profile'>
                {{ csrf_field() }}
                <div class='form-group'>
                    <label>Bio:</label>
                    <input type='text' name="bio" value="{{ $caregiver->bio or '' }}">
                </div>
                <div class='form-group'>
                    <label>ZIP Code:</label>
                    <input type='text' name="zip_code" value="{{ $caregiver->zip_code or '' }}">
                </div>
                <div class='form-group'>
                    <label>Smoker:
                        <input type='checkbox' name='is_smoker' {{ $caregiver->is_smoker ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group'>
                    <label>Driver:
                        <input type='checkbox' name='is_driver' {{ $caregiver->is_driver ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group'>
                    <label>CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ $caregiver->is_cpr_certified ? 'checked' : ''}} value=" {{ $caregiver->is_cpr_certified}}">
                    </label>
                </div>
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop