@extends('layouts.layout')
@section('title', 'Reports')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Reports')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Visitor Report</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{ route('reports.search.result') }}" method="POST">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="text-center">
                                            <label class="mb-1" for="date">Select Date</label>
                                            <input class="form-control" name="date" type="date" required />
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
