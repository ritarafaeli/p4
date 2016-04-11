@extends('layouts.master')

@section('content')
    <h4><i class="fa fa-users"></i> Caregivers</h4>
    @if(isset($caregiver))
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="media block-update-card">
                    <a class="pull-left" href="#">
                        @if($caregiver->profile_picture != null)
                            <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $caregiver->id }}"><img class="media-object update-card-MDimentions" src="{{ $caregiver->profile_picture }}" alt=""></a>
                        @else
                            <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $caregiver->id }}"><img class="media-object update-card-MDimentions" src="{{URL::asset('assets/img/default_profile_avatar.jpg')}}" alt=""></a>
                        @endif
                    </a>

                    <div class="media-body update-card-body">
                        <h4 class="media-heading">{{ $caregiver->name }}</h4>
                        <p>{{ $caregiver->bio }}</p>
                        <p><b>Last Login: </b>{{ $caregiver->last_login }}</p>
                    </div>

                    <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
                        <a class="btn-group btn-grey" href="/caregiver/favorite/{{ $caregiver->user_id }}"><i class="fa fa-heart"></i></a>
                        <a class="btn-group btn-grey" href="/message/{{ $caregiver->user_id }}"><i class="btn-group fa fa-envelope"></i></a>
                        <a class="btn-group btn-grey" href="/caregiver/{{ $caregiver->id }}"><i class="btn-group fa fa-user"></i></a>
                    </div>
                </div>
            </div>
        </div>

    @else
        <p>Sorry, caregiver does not exist.</p>
    @endif
@stop