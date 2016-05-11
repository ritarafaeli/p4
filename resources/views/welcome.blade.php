@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Hello @if(Auth::check()) {{ Auth::user()->name }} @endif</div>
    <div class="panel-body">
        <p>Welcome to Find a Babysitter.</p>
        <div class="row">
            <div class="col-md-4">
                <img src="assets/img/welcome-1color.jpg" class="img-fluid img-thumbnail">
            </div>
            <div class="col-md-8">
                Parents, here are just a few of the qualities our caretakers have:
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Experienced and nurturing</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Educated and certified</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Fluent in multiple languages</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Have excellent references</li>
                </ul>
            </div>
        </div>

        <div class="row" style="padding-top: 30px;">
            <div class="col-md-8">
                Caretakers, what we offer:
                <ul class="fa-ul">
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Connect directly with potential employers</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Wide selection of jobs available - new jobs listed daily</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Search through hourly rates</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>Local jobs with children of all ages</li>
                    <li><i class="fa fa-li fa-star" aria-hidden="true"></i>The perfect job is waiting for you!</li>
                </ul>
            </div>
            <div class="col-md-4">
                <img src="assets/img/welcome-2.jpg" class="img-fluid img-thumbnail">
            </div>
        </div>
    </div>
</div>

@stop