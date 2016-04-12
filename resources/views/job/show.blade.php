@extends('layouts.master')

@section('content')
    @if(isset($job))
        <div class="row">
            <div class="col-md-4">
                <div class="media block-update-card">
                    <a class="pull-left" href="#">
                        @if($job->profile_picture != null)
                            <img class="img-thumbnail pull-left update-card-MDimentions" src="{{ URL::asset($job->profile_picture) }}" alt="">
                        @else
                            <img class="pull-left update-card-MDimentions" src="{{URL::asset('assets/img/default_profile_avatar.jpg')}}" alt="">
                        @endif
                    </a>
                    <div class="media-body update-card-body">
                        <h4 class="media-heading text-center">{{ $job->title }}</h4>
                        <p><b>Description: </b>{{ $job->description }}</p>
                        <ul class="fa-ul">
                            <li><i class="fa fa-li fa-usd" aria-hidden="true"></i> Hourly Range is {{ $job->hourly_rate_id }}.</li>
                            @if($job->education_level !== null)
                                <li><i class="fa-li fa fa-graduation-cap"></i> Requires {{ $job->education_level }}.</li>
                            @endif
                            <li><i class="fa fa-li fa-child"></i> {{ $job->num_children === 1 ? '1 child' : $job->num_children . ' children'}}.</li>
                            @if(!$job->is_smoker)
                                <li><i class="fa-li fa fa-check-square"></i> No smokers please.</li>
                            @endif
                            @if(isset($languages))
                                <li><i class="fa-li fa fa-check-square"></i><b>Languages:</b>
                                @foreach($languages as $language)
                                    {{ $language->language }},
                                @endforeach
                                </li>
                            @endif
                        </ul>
                    </div>
                    <div class="caregiver-card-features pull-left" role="toolbar">
                        @if($job->is_driver)
                            <i title="Requires Transportation" data-toggle="tooltip" data-placement="bottom" class="fa fa-car fa-lg"></i>
                        @endif
                        @if($job->is_cpr_certified)
                            <i title="Requires CPR Certification" data-toggle="tooltip" data-placement="bottom" class="fa fa-heartbeat fa-lg"></i>
                        @endif
                    </div>
                    <div class="card-action-pellet btn-toolbar pull-right" role="toolbar">
                        <a class="btn-group btn-grey" href="/favorite/{{ $job->user_id }}"><i class="fa fa-heart"></i></a>
                        <a class="btn-group btn-grey" href="/message/{{ $job->user_id }}"><i class="btn-group fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>

    @else
        <p>Sorry, job does not exist.</p>
    @endif
@stop
