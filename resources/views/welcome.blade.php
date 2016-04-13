@extends('layouts.master')

@section('content')

    @if(Auth::check())
        <p>Hello {{ Auth::user()->name }},</p>
    @endif
    <p>Welcome to Find a Babysitter.</p>
@stop