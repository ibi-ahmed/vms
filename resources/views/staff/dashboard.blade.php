@extends('layouts.layout')
@section('title', 'Staff Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Staff Dashboard')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Dashboard</div>
            <div class="card-body text-center">
                <a href="{{ route('appointments.my') }}" class="btn btn-lg btn-outline-primary mx-3">My Appointments</a>
                <a href="{{ route('visitor.my') }}" class="btn btn-lg btn-outline-primary">My Visitors</a>
                <a href="{{ route('appointments.schedule') }}" class="btn btn-lg btn-outline-primary mx-3">Schedule Appointment</a>
            </div>
        </div>
    </div>
</div>

@stop
