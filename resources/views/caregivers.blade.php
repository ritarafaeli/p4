@extends('layouts.master')

@section('content')
    <h4>Caregivers</h4>
@if(isset($caregivers))
    <div class="container">
    @foreach($caregivers as $caregiver)
        <div class="col-lg-4 col-sm-6 text-center">
        @if($caregiver->profile_picture != null)
            <a href="/caregiver/{{ $caregiver->id }}"><img class="img-circle img-responsive img-center" src="{{ $caregiver->profile_picture }}" alt=""></a>
        @else
            <a href="/caregiver/{{ $caregiver->id }}"><img class="img-circle img-responsive img-center" src="http://placehold.it/100x100" alt=""></a>
        @endif
            <h3>{{ $caregiver->name }}</h3>
            <p>{{ $caregiver->bio }}</p>
        </div>
    @endforeach
    </div>
@else
    <p>No caregivers to display</p>
@endif
@stop