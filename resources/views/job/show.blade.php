@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{ $job->title }}</div>
    <div class="panel-body">
        <p>{{ $job->description }}</p>
    </div>
    <ul class="list-group">
        <li class="list-group-item">
            <label>Number of Children: </label><span>{{ $job->num_children }}</span>
        </li>
        <li class="list-group-item">
            <label>ZIP: </label><span>{{ $job->zip_code }}</span>
        </li>
        <li class="list-group-item">
            <label>Hourly Rate: </label><span>{{ $job->hourly_rate_id }}</span></li>
        <li class="list-group-item">
            <label>Education Level: </label><span>{{ $job->education_level_id }}</span>
        </li>
        <li class="list-group-item">
            <label>Smoker: </label><span>{{ $job->is_smoker ? "Yes" : "No" }}</span>
        </li>
        <li class="list-group-item">
            <label>Drives Car: </label><span>{{ $job->is_driver ? "Yes" : "No" }}</span>
        </li>
        <li class="list-group-item">
            <label>CPR Certified: </label><span>{{ $job->is_cpr_certified ? "Yes" : "No" }}</span>
        </li>
    </ul>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Contact Information</div>
    <ul class="list-group">
        <li class="list-group-item">
            @if($job->user_profile_picture != null)
                <img class="img-thumbnail img-responsive img-left" src="{{ $job->user_profile_picture }}" alt="">
            @else
                <img class="img-thumbnail img-responsive img-left" src="http://placehold.it/200x200" alt="">
            @endif
        </li>
        <li class="list-group-item">
            <label>Name: </label><span>{{ $job->user_name }}</span>
        </li>
        <li class="list-group-item">
            <label>Email: </label><span>{{ $job->user_email }}</span>
        </li>
    </ul>
</div>

@stop