@extends('layouts.master')

@section('content')
<h4>My Jobs</h4>
<div class="container">
    @foreach($jobs as $job)
        <div class="col-xs-6 col-md-3 text-center">
            @if($job->user_profile_picture != null)
                <a href="/job/{{ $job->id }}"><img class="img-circle img-responsive img-center" src="{{ $job->user_profile_picture }}" alt=""></a>
            @else
                <a href="/job/{{ $job->id }}"><img class="img-circle img-responsive img-center" src="http://placehold.it/100x100" alt=""></a>
            @endif
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->description }}</p>
        </div>
    @endforeach
</div>

<button type="button" class="btn btn-default btn-lg" href="/job/create">
    <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>  Post New Job
</button>
@stop