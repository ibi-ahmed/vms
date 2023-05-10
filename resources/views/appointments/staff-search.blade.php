@extends('layouts.layout')
@section('title', 'Search Staff')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Search Staff')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Search Staff</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <form action="{{ route('appointments.staff-view') }}" method="POST">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <staff-search-component></staff-search-component>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-center">
                                    <div class="row">
                                        <div class="col-sm-6 offset-sm-3 d-grid">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
