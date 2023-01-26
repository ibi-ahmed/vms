@extends('layouts.layout')
@section('title', 'User Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'User Dashboard')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Dashboard</div>
            <div class="card-body text-center">
                <a href="{{ route('appointments.recent') }}" class="btn btn-lg btn-outline-primary mx-3">Recent Appointments</a>
                <a href="{{ route('visitor.recent') }}" class="btn btn-lg btn-outline-primary">Recent Visits</a>
                <a href="{{ route('visitor.add') }}" class="btn btn-lg btn-outline-primary mx-3">Create Appointment</a>
            </div>
        </div>
    </div>
</div>

@stop
