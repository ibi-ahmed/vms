@extends('layouts.layout')
@section('title', 'Add Tags')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Add Tags')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Add Visitor Tag</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <form action="{{ route('tags.add') }}" method="POST">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Total Number of Tags</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" value="{{ $tags->count() }}" readonly/>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Number of Tags Required</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="number_tags" type="number" placeholder="Enter Number of Tags" required/>
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
