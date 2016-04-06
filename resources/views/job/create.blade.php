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
    <div class="panel-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Job</div>
    <div class="panel-body">
        <div class='alert alert-danger' role="alert" ng-show="errors">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            Please correct the form errors below and try again.
        </div>
        <form method='POST' action='/job/create'>
            {!! csrf_field() !!}
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Title</label>
                <div class="col-sm-4">
                    <input class="form-control" type='text' name='title' value='{{ old('title') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-4">
                    <input type='text' class="form-control" name='description' value='{{ old('description') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Number of Children</label>
                <div class="col-sm-4">
                    <input class="form-control" type='number' name='num_children' value='{{ old('num_children') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">ZIP Code</label>
                <div class="col-sm-4">
                    <input class="form-control" type='number' name='zip_code' value='{{ old('zip_code') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Education Level</label>
                <div class="col-sm-4">
                    <input type='text' class="form-control" name='education_level_id' value='{{ old('education_level_id') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Hourly Rate</label>
                <div class="col-sm-4">
                    <input type='text' class="form-control" name='hourly_rate_id' value='{{ old('hourly_rate_id') }}'>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type='submit' class='btn btn-primary'>Post Job</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <p>View my <a href='/jobs/all'>job postings</a>.</p>
    </div>
</div>
@stop
