@extends('layouts.layout')
@section('title', 'Security Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Security Dashboard')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-4 offset-4">
                        <form action="{{ route('appointments.all') }}">
                            <div class="input-group">
                                <input class="form-control text-center" name="query" type="text" placeholder="Search Visitor Appointment" aria-describedby="button-addon" required>
                                <button class="btn btn-sm btn-primary" type="submit" id="button-addon">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <a href="{{ route('appointments.recent') }}" class="btn btn-lg btn-outline-primary mx-3">Today's Appointments</a>
                <a href="{{ route('visitor.recent') }}" class="btn btn-lg btn-outline-primary">Today's Visits</a>
                <a href="{{ route('visitor.add') }}" class="btn btn-lg btn-outline-primary mx-3">Create Appointment</a>
            </div>
        </div>
    </div>
</div>

@stop
