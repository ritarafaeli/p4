@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Job Listing</div>
        <div class="panel-body">
            <form method='POST' action='/job/edit/{{ $job->id }}'>
                {{ csrf_field() }}
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Title:</label>
                    <div class="col-sm-4">
                        <input type='text' name="title" value="{{ $job->title }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Description:</label>
                    <div class="col-sm-4">
                        <input type='text' name="description" value="{{ $job->description }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Number of Children</label>
                    <div class="col-sm-4">
                        <input type='text' name="num_children" value="{{ $job->num_children }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">ZIP</label>
                    <div class="col-sm-4">
                        <input type='text' name="zip_code" value="{{ $job->zip_code }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Hourly Rate</label>
                    <div class="col-sm-4">
                        <select class="form-control"  name="hourly_rate_id">
                            @foreach ($hourly_rates as $key => $value)
                                <option value="{{ $key }}" {{ $job->hourly_rate_id === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Education Level</label>
                    <div class="col-sm-4">
                        <select class="form-control"  name="education_level_id">
                            @foreach ($education_levels as $key => $value)
                                <option value="{{ $key }}" {{ $job->education_level_id === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Smoker
                        <input type='checkbox' name='is_smoker' {{ $job->is_smoker ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Driver
                        <input type='checkbox' name='is_driver' {{ $job->is_driver ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ $job->is_cpr_certified ? 'checked' : ''}}>
                    </label>
                </div>
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@stop