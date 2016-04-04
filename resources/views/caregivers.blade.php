@extends('layouts.master')

@section('content')
    <h4>Caregivers</h4>
    @if(isset($caregivers))
        @foreach($caregivers as $caregiver)
            <table class="table table-bordered">
                <tr>
                    <td>Bio</td>
                    <td>{{ $caregiver->bio }}</td>
                </tr>
                <tr>
                    <td>CPR Cert</td>
                    <td>{{ $caregiver->is_cpr_certified }}</td>
                </tr>
                <tr>
                    <td>Driver</td>
                    <td>{{ $caregiver->is_driver }}</td>
                </tr>

            </table>
        @endforeach
    @else
        <p>No caregivers to display</p>
    @endif
@stop