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
    <div class="panel-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Job</div>
    <div class="panel-body">
        <form method='POST' action='/job/create'>
            {{ csrf_field() }}
            <div class='form-group'>
                <label>Title:</label>
                <input type='text' name='title'>
            </div>
            <div class='form-group'>
                <label>Description:</label>
                <input type='text' name='description'>
            </div>
            <div class='form-group'>
                <label>Number of Children:</label>
                <input type='number' name='num_children'>
            </div>
            <div class='form-group'>
                <label>ZIP Code:</label>
                <input type='number' name='zip_code'>
            </div>
            <div class='form-group'>
                <label>Education Level:</label>
                <input type='text' name='education_level'>
            </div>
            <div class='form-group'>
                <label>Hourly Rate:</label>
                <input type='text' name='hourly_rate_id'>
            </div>
            <button type='submit' class="btn btn-primary">Post Job</button>
        </form>
    </div>
</div>
@stop
