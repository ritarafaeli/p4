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
        <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</div>
        <div class="panel-body">
        @if(count($errors) > 0)
            <ul class="fa-ul error">
                @foreach ($errors->all() as $error)
                    <li><i class="fa fa-li fa-exclamation-circle" aria-hidden="true"></i>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
            <form method='POST' action='/profile'>
                {{ csrf_field() }}
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Bio:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name='bio' rows="3">{{ old('bio', $caregiver->bio) }}</textarea>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">ZIP Code:</label>
                    <div class="col-sm-10">
                        <input type='text' name="zip_code" value="{{ old('zip_code', $caregiver->zip_code) }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Age:</label>
                    <div class="col-sm-10">
                        <input type='text' name="age" value="{{ old('age', $caregiver->age) }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Years of Experience:</label>
                    <div class="col-sm-10">
                        <input type='text' name="years_experience" value="{{ old('years_experience', $caregiver->years_experience) }}">
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Education Level</label>
                    <div class="col-sm-10">
                        <select class="form-control"  name="education_level_id">
                            @foreach ($education_levels as $key => $value)
                                <option value="{{ $key }}" {{ old('education_level_id', $caregiver->education_level_id) === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label">Hourly Rate</label>
                    <div class="col-sm-10">
                        <select class="form-control"  name="hourly_rate_id">
                            @foreach ($hourly_rates as $key => $value)
                                <option value="{{ $key }}" {{ old('hourly_rate_id', $caregiver->hourly_rate_id) === $key ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Smoker:
                        <input type='checkbox' name='is_smoker' {{ old('is_smoker', $caregiver->is_smoker) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Driver:
                        <input type='checkbox' name='is_driver' {{ old('is_driver', $caregiver->is_driver) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ old('is_cpr_certified', $caregiver->is_cpr_certified) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Experienced with Infants:
                        <input type='checkbox' name='is_experienced_infants' {{ old('is_experienced_infants', $caregiver->is_experienced_infants) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Experienced with Toddlers:
                        <input type='checkbox' name='is_experienced_toddlers' {{ old('is_experienced_toddlers', $caregiver->is_experienced_toddlers) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Experienced with Preschoolers:
                        <input type='checkbox' name='is_experienced_preschoolers' {{ old('is_experienced_preschoolers', $caregiver->is_experienced_preschoolers) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-3 control-label">Experienced with Special Needs:
                        <input type='checkbox' name='is_experienced_specialneeds' {{ old('is_experienced_specialneeds', $caregiver->is_experienced_specialneeds) ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="What language(s) do you speak fluently?" data-toggle="tooltip" data-placement="top">Languages</label>
                    <div class="col-sm-4">
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
                <button type='submit' class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop