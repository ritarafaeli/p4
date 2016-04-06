@extends('layouts.master')

@section('content')
<h4><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> My Jobs</h4>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $key => $value)
            <tr>
                <th scope="row">{{ $key + 1}}</th>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
                <td><a href="/job/edit/{{ $value->id }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                <td><a href="/job/delete/{{ $value->id }}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p class="navbar-btn">
        <a href="/newjob" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Post a New Job</a>
    </p>
</div>
@stop