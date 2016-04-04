@extends('layouts.master')

@section('content')
    <p>Welcome to Find a Babysitter.</p>
    {{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}
@stop