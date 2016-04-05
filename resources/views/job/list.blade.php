@extends('layouts.master')

@section('content')
    <h4>Jobs</h4>
    @if(isset($jobs))
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
    @else
        <p>No jobs to display</p>
    @endif
@stop