@extends('layouts.master')

@section('content')
    @if(isset($caregiver))
        <div class="row">
            <div class="col-md-4">
                <div class="media block-update-card">
                    <a class="pull-left" href="#">
                        @if($caregiver->profile_picture != null)
                            <img class="img-thumbnail pull-left update-card-MDimentions" src="{{URL::asset($caregiver->profile_picture)}}" alt="">
                        @else
                            <img class="pull-left update-card-MDimentions" src="{{URL::asset('assets/img/default_profile_avatar.jpg')}}" alt="">
                        @endif
                    </a>

                    <div class="media-body update-card-body">
                        <h4 class="media-heading text-center">{{ $caregiver->name }}</h4>
                        <p><b>Age: </b>{{ $caregiver->age }}</p>
                        <p><b>Bio: </b>{{ $caregiver->bio }}</p>
                        <p><b>Last Login: </b>{{ $caregiver->last_login }}</p>
                        <ul class="fa-ul">
                        @if($caregiver->education_level !== null)
                            <li><i class="fa-li fa fa-graduation-cap"></i> Completed {{ $caregiver->education_level }}</li>
                        @endif
                            <li><i class="fa fa-li fa-child"></i> Will work with up to {{ $caregiver->max_children === 1 ? '1 child' : $caregiver->max_children . ' children'}}.</li>
                            <li><i class="fa-li fa fa-check-square"></i> Has {{ $caregiver->years_experience === 1 ? '1 year' : $caregiver->years_experience . ' years'}} experience.</li>
                        @if($caregiver->is_experienced_specialneeds)
                            <li><i class="fa-li fa fa-check-square"></i> Is experienced with children with special needs.</li>
                        @endif
                        @if($caregiver->is_experienced_infants)
                            <li><i class="fa-li fa fa-check-square"></i> Is experienced with infants.</li>
                        @endif
                        @if($caregiver->is_experienced_toddlers)
                            <li><i class="fa-li fa fa-check-square"></i> Is experienced with toddlers.</li>
                        @endif
                        @if($caregiver->is_experienced_preschoolers)
                            <li><i class="fa-li fa fa-check-square"></i> Is experienced with preschoolers.</li>
                        @endif
                            @if($caregiver->is_smoker)
                                <li><i class="fa-li fa fa-check-square"></i> Is a smoker.</li>
                            @endif
                        </ul>
                    </div>
                    <div class="caregiver-card-features pull-left" role="toolbar">
                        @if($caregiver->is_driver)
                            <i title="Has Transportation" data-toggle="tooltip" data-placement="bottom" class="fa fa-car fa-lg"></i>
                        @endif
                        @if($caregiver->is_cpr_certified)
                            <i title="CPR Certified" data-toggle="tooltip" data-placement="bottom" class="fa fa-heartbeat fa-lg"></i>
                        @endif
                    </div>
                    <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
                        <a title="Add to Favorites" data-toggle="tooltip" data-placement="bottom" class="btn-group btn-grey" href="/caregiver/favorite/{{ $caregiver->user_id }}"><i class="fa fa-heart"></i></a>
                        <a title="Message" data-toggle="tooltip" data-placement="bottom" class="btn-group btn-grey" href="mailto:{{ $caregiver->email }}?Subject='Looking for a Babysitter'"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

    @else
        <p>Sorry, caregiver does not exist.</p>
    @endif
@stop