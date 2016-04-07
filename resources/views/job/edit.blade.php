@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Job Listing</div>
        <div class="panel-body">
            <form method='POST' action='/job/edit/{{ $job->id }}'>
                {{ csrf_field() }}
                <div class='form-group'>
                    <label>Title:</label>
                    <input type='text' name="title" value="{{ $job->title }}">
                </div>
                <div class='form-group'>
                    <label>Description:</label>
                    <input type='text' name="description" value="{{ $job->description }}">
                </div>
                <div class='form-group'>
                    <label>Number of Children:</label>
                    <input type='text' name="num_children" value="{{ $job->num_children }}">
                </div>
                <div class='form-group'>
                    <label>ZIP:</label>
                    <input type='text' name="zip_code" value="{{ $job->zip_code }}">
                </div>
                <div class='form-group'>
                    <label>Hourly Rate:</label>
                    <input type='text' name="hourly_rate_id" value="{{ $job->hourly_rate_id }}">
                </div>
                <div class='form-group'>
                    <label>Education Level:</label>
                    <input type='text' name="education_level_id" value="{{ $job->education_level_id }}">
                </div>
                <div class='form-group'>
                    <label>Smoker:
                        <input type='checkbox' name='is_smoker' {{ $job->is_smoker ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group'>
                    <label>Driver:
                        <input type='checkbox' name='is_driver' {{ $job->is_driver ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group'>
                    <label>CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ $job->is_cpr_certified ? 'checked' : ''}}>
                    </label>
                </div>
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@stop