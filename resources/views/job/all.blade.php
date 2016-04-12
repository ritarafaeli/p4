@extends('layouts.master')
@section('content')
<h4><i class="fa fa-list-alt"></i> My Jobs</h4>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th></th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $key => $value)
            <tr>
                <th scope="row">{{ $key + 1}}</th>
                <td>
                    <p class="text-left">
                        <a class="btn-blue" href="/job/{{ $value->id }}"><i title="View" data-toggle="tooltip" data-placement="bottom" class="fa fa-eye fa-fw"></i></a>
                        <a class="btn-blue" href="/job/edit/{{ $value->id }}"><i title="Edit" data-toggle="tooltip" data-placement="bottom" class="fa fa-pencil fa-fw"></i></a>
                        <a class="btn-blue" href="/job/delete/{{ $value->id }}"><i title="Delete" data-toggle="tooltip" data-placement="bottom" class="fa fa-trash fa-fw"></i></a>
                    </p>
                </td>
                <td>{{ $value->title }}</td>
                <td>{{ $value->description }}</td>
            </tr>
        @endforeach
            <tr>
                <th scope="row"><a class="btn-grey" href="/newjob" title="Post New Job" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-lg fa-plus-circle"></i></a></th>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@stop