@extends('layouts.layout')
@section('title', 'Administrator Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Administrator Dashboard')

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
                <a href="{{ route('appointments.recent') }}" class="btn btn-lg btn-outline-primary mx-3">Recent Appointments</a>
                <a href="{{ route('visitor.recent') }}" class="btn btn-lg btn-outline-primary">Recent Visits</a>
                <a href="{{ route('visitor.add') }}" class="btn btn-lg btn-outline-primary mx-3">Create Appointment</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-sm-4 border-end border-dark">
                            <p>Visitors in HQ</p>
                            <p class="fs-1">{{ $hq_count }}</p>
                        </div>
                        <div class="col-sm-4 border-end border-dark">
                            <p>Visitors in Annex</p>
                            <p class="fs-1">{{ $annex_count }}</p>
                        </div>
                        <div class="col-sm-4 border-primary">
                            <p>Total Visitors</p>
                            <p class="fs-1">{{ $hq_count + $annex_count }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
