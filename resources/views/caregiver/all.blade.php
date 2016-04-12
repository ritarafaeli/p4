@extends('layouts.master')

@section('content')
    <h4><i class="fa fa-users"></i> Caregivers</h4>
    @if(isset($caregivers))
        @foreach($caregivers as $key => $value)
            <div class="row">
                <div class="col-md-4">
                    <div class="media block-update-card">
                        <a class="pull-left" href="#">
                            @if($value->profile_picture != null)
                                <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $value->id }}"><img class="img-circle media-object update-card-MDimentions" src="{{ $value->profile_picture }}" alt=""></a>
                            @else
                                <a class="pull-left" title="View Profile" data-toggle="tooltip" data-placement="bottom" href="/caregiver/{{ $value->id }}"><img class="media-object update-card-MDimentions" src="{{URL::asset('assets/img/default_profile_avatar.jpg')}}" alt=""></a>
                            @endif
                        </a>
                        <div class="media-body update-card-body">
                            <h4 class="media-heading text-center">{{ $value->name }}</h4>
                            <p><b>Age: </b>{{ $value->age }}</p>
                            <p><b>Bio: </b>{{ $value->bio }}</p>
                            <p><b>Last Login: </b>{{ $value->last_login }}</p>
                            <ul class="fa-ul">
                                @if($value->education_level !== null)
                                    <li><i class="fa-li fa fa-graduation-cap"></i> Completed {{ $value->education_level }}</li>
                                @endif
                                <li><i class="fa fa-li fa-child"></i> Will work with up to {{ $value->max_children === 1 ? '1 child' : $value->max_children . ' children'}}.</li>
                                <li><i class="fa-li fa fa-check-square"></i> Has {{ $value->years_experience === 1 ? '1 year' : $value->years_experience . ' years'}} experience.</li>
                            @if($value->is_experienced_specialneeds)
                                <li><i class="fa-li fa fa-check-square"></i> Is experienced with children with special needs.</li>
                            @endif
                            </ul>
                        </div>
                        <div class="caregiver-card-features pull-left" role="toolbar">
                            @if($value->is_driver)
                                <i title="Has Transportation" data-toggle="tooltip" data-placement="bottom" class="fa fa-car fa-lg"></i>
                            @endif
                            @if($value->is_cpr_certified)
                                <i title="CPR Certified" data-toggle="tooltip" data-placement="bottom" class="fa fa-heartbeat fa-lg"></i>
                            @endif
                        </div>
                        <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
                            <a title="Add to Favorites" data-toggle="tooltip" data-placement="bottom" class="btn-group btn-grey" href="/caregiver/favorite/{{ $value->user_id }}"><i class="fa fa-heart"></i></a>
                            <a title="Message" data-toggle="tooltip" data-placement="bottom" class="btn-group btn-grey" href="/message/{{ $value->user_id }}"><i class="btn-group fa fa-envelope"></i></a>
                            <a title="View Profile" data-toggle="tooltip" data-placement="bottom" class="btn-group btn-grey" href="/caregiver/{{ $value->id }}"><i class="btn-group fa fa-user"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    @else
        <p>No caregivers to display</p>
    @endif
@stop