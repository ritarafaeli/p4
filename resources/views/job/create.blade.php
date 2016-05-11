@extends('layouts.master')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create New Job</div>
    <div class="panel-body">

    @if(count($errors) > 0)
        <ul class="fa-ul error">
            @foreach ($errors->all() as $error)
                <li><i class="fa fa-li fa-exclamation-circle" aria-hidden="true"></i>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <form method='POST' action='/job/create'>
            {!! csrf_field() !!}
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="Job Title will be viewable in search." data-toggle="tooltip" data-placement="top">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type='text' name='title'  value="Looking For a Caretaker For My Child" value='{{ old('title') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="Brief description of the job requirements." data-toggle="tooltip" data-placement="top">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control"  name='description' value='{{ old('description') }}' rows="3"></textarea>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="How many children do you need a caregiver for?" data-toggle="tooltip" data-placement="top">Number of Children</label>
                <div class="col-sm-10">
                    <input class="form-control" type='number' name='num_children' value='{{ old('num_children') || 1}}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="Where will the care be needed?" data-toggle="tooltip" data-placement="top">ZIP Code</label>
                <div class="col-sm-10">
                    <input class="form-control" type='text' name='zip_code' value='{{ old('zip_code') }}'>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="What education level do you require of the caregiver?" data-toggle="tooltip" data-placement="top">Education Level</label>
                <div class="col-sm-10">
                    <select class="form-control"  name="education_level_id">
                        @foreach ($education_levels as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="How much are you looking to pay the caregiver?" data-toggle="tooltip" data-placement="top">Hourly Rate</label>
                <div class="col-sm-10">
                    <select class="form-control"  name="hourly_rate_id">
                        @foreach ($hourly_rates as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-2 control-label" title="What language(s) would you like spoken at home?" data-toggle="tooltip" data-placement="top">Languages</label>
                <div class="col-sm-10">
                    <select multiple class="form-control"  name="language_ids[]">
                    @foreach ($languages as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Smoker
                    <input type='checkbox' name='is_smoker' {{ old('is_smoker') ? 'checked' : ''}}>
                </label>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">Driver
                    <input type='checkbox' name='is_driver' {{ old('is_driver') ? 'checked' : ''}}>
                </label>
            </div>
            <div class='form-group row'>
                <label class="col-sm-3 control-label">CPR Certified:
                    <input type='checkbox' name='is_cpr_certified' {{ old('is_cpr_certified') ? 'checked' : ''}}>
                </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type='submit' class='btn btn-primary'>Post Job</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-footer">
        <p class="navbar-btn">
            <a href="/jobs/all" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> My Job Posts</a>
        </p>
    </div>
</div>
@stop
