@extends('layouts.master')
@section('content')
<h4><i class="fa fa-list-alt"></i> My Jobs</h4>
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
                <td><a class="btn-blue" href="/job/edit/{{ $value->id }}" title="Edit Job Listing" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-pencil"></i></a></td>
                <td><a class="btn-blue" href="/job/delete/{{ $value->id }}" title="Delete Job Listing" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-trash"></i></a></td>
            </tr>
        @endforeach
            <tr>
                <th scope="row"><a class="btn-grey" href="/newjob" title="Post New Job" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-plus-circle"></i></a></th>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@stop