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
    @if(count($errors) > 0)
        <ul class='errors'>
            @foreach ($errors->all() as $error)
                <li><span class='fa fa-exclamation-circle'></span> <div class="error">{{ $error }}</div></li>
            @endforeach
        </ul>
    @endif
    <div class="panel-group panel-primary">
        <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> My Profile</div>
        <div class="panel-body">
            <form method='POST' action='/profile'>
                {{ csrf_field() }}
                <div class='form-group row'>
                    <label>Bio:</label>
                    <input type='text' name="bio" value="{{ $caregiver->bio or '' }}">
                </div>
                <div class='form-group row'>
                    <label>ZIP Code:</label>
                    <input type='text' name="zip_code" value="{{ $caregiver->zip_code or '' }}">
                </div>
                <div class='form-group row'>
                    <label>Smoker:
                        <input type='checkbox' name='is_smoker' {{ $caregiver->is_smoker ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label>Driver:
                        <input type='checkbox' name='is_driver' {{ $caregiver->is_driver ? 'checked' : ''}}>
                    </label>
                </div>
                <div class='form-group row'>
                    <label>CPR Certified:
                        <input type='checkbox' name='is_cpr_certified' {{ $caregiver->is_cpr_certified ? 'checked' : ''}} value=" {{ $caregiver->is_cpr_certified}}">
                    </label>
                </div>
                <div class='form-group row'>
                    <label class="col-sm-2 control-label" title="What language(s) would you like spoken at home?" data-toggle="tooltip" data-placement="top">Languages</label>
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