@extends('layouts.master')

@section('content')
    <h4>Caregivers</h4>
@if(isset($caregivers))
    <div class="row">
@foreach($caregivers as $key => $value)
    @if(!($key % 3) and $key > 0)
    </div>
    <div class="row">
        @endif
        <div class="col-md-4 text-center">
        @if($value->profile_picture != null)
            <a href="/caregiver/{{ $value->id }}"><img class="img-circle img-responsive img-center" src="{{ $caregiver->profile_picture }}" alt=""></a>
        @else
            <a href="/caregiver/{{ $value->id }}"><img class="img-circle img-responsive img-center" src="http://placehold.it/100x100" alt=""></a>
        @endif
            <h3>{{ $value->name }}</h3>
            <p>{{ $value->bio }}</p>
        </div>

        @endforeach
    </div>

@else
    <p>No caregivers to display</p>
@endif
@stop