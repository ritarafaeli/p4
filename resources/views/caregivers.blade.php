@extends('layouts.master')

@section('content')
<h4><i class="fa fa-users"></i> Caregivers</h4>
@if(isset($caregivers))
    @foreach($caregivers as $key => $value)
    <div class="row">
        <div class="col-md-4 text-center">
            <div class="media block-update-card">
                <a class="pull-left" href="#">
                @if($value->profile_picture != null)
                    <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $value->id }}"><img class="media-object update-card-MDimentions" src="{{ $caregiver->profile_picture }}" alt=""></a>
                @else
                    <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $value->id }}"><img class="media-object update-card-MDimentions" src="assets/img/default_profile_avatar.jpg" alt=""></a>
                @endif
                </a>

                <div class="media-body update-card-body">
                    <h4 class="media-heading">{{ $value->name }}</h4>
                    <p>{{ $value->bio }}</p>
                    <p><b>Last Login: </b>{{ $value->last_login }}</p>
                </div>

                <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
                    <a class="btn-group btn-grey" href="/caregiver/favorite/{{ $value->user_id }}"><i class="fa fa-heart"></i></a>
                    <a class="btn-group btn-grey" href="/message/{{ $value->user_id }}"><i class="btn-group fa fa-envelope"></i></a>
                    <a class="btn-group btn-grey" href="/caregiver/{{ $value->id }}"><i class="btn-group fa fa-user"></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@else
<p>No caregivers to display</p>
@endif
@stop