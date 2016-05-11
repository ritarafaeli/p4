@extends('layouts.master')

@section('content')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#search').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                }
            });
        });
    </script>
    <div class="panel panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Job Listing</div>
        <div class="panel-body">
        @if(count($errors) > 0)
            <ul class="fa-ul error">
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-li fa-exclamation-circle" aria-hidden="true"></i>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            <form method='POST' action='/job/edit/{{ $job->id }}'>
                {!! csrf_field() !!}
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="Job Title will be viewable in search." data-toggle="tooltip" data-placement="top">Title</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='title'  value="{{ old('title', $job->title) }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="Brief description of the job requirements." data-toggle="tooltip" data-placement="top">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control"  name='description' rows="3">{{ old('description', $job->description) }}</textarea>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="How many children do you need a caregiver for?" data-toggle="tooltip" data-placement="top">Number of Children</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='number' name='num_children' value='{{ old('num_children', $job->num_children) }}'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="Where will the care be needed?" data-toggle="tooltip" data-placement="top">ZIP Code</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='zip_code' value='{{ old('zip_code', $job->zip_code) }}'>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="What education level do you require of the caregiver?" data-toggle="tooltip" data-placement="top">Education Level</label>
                    <div class="col-sm-10">
                        <select class="form-control"  name="education_level_id">
                        @foreach ($education_levels as $key => $value)
                            <option value="{{ $key }}" {{ old('education_level_id', $job->education_level_id) === $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="How much are you looking to pay the caregiver?" data-toggle="tooltip" data-placement="top">Hourly Rate</label>
                    <div class="col-sm-10">
                        <select class="form-control"  name="hourly_rate_id">
                        @foreach ($hourly_rates as $key => $value)
                            <option value="{{ $key }}" {{ old('hourly_rate_id', $job->hourly_rate_id) === $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="What language(s) would you like spoken at home?" data-toggle="tooltip" data-placement="top">Languages</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-xs-5">
                                <select name="from[]" id="search" class="form-control" size="8" multiple="multiple">
                                    @foreach($languages as $lid => $lname)
                                        @if(!array_key_exists($lid,$selected_languages))
                                    <option value="{{ $lid }}">{{$lname}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-xs-2">
                                <button type="button" id="search_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
                                <button type="button" id="search_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
                                <button type="button" id="search_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button type="button" id="search_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
                            </div>

                            <div class="col-xs-5">
                                <select name="language_ids[]" id="search_to" class="form-control" size="8" multiple="multiple">
                                    @foreach($languages as $lid => $lname)
                                        @if(array_key_exists($lid,$selected_languages))
                                            <option value="{{ $lid }}">{{$lname}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Smoker
                        <input type='checkbox' name='is_smoker' {{ old('is_smoker', $job->is_smoker) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Driver
                        <input type='checkbox' name='is_driver' {{ old('is_driver', $job->is_driver) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ old('is_cpr_certified', $job->is_cpr_certified) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type='submit' class='btn btn-primary'>Update</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <p class="navbar-btn">
                <a href="/jobs/all" class="btn btn-default"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> My Job Posts</a>
            </p>
        </div>
    </div>
@stop
