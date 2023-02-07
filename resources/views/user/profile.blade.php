@extends('layouts.layout')
@section('title', Auth::user()->role->name . ' Profile')

@section('content')
@section('icon', 'activity')
@section('sub_head', Auth::user()->role->name . ' Profile')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Profile</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{ route('update.user.profile', Auth::user()) }}" method="POST">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="name" type="text"
                                                placeholder="Enter name" value="{{ auth()->user()->name }}" />
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="email" type="text"
                                                value="{{ auth()->user()->email }}" />
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Designation</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text"
                                             value="{{ auth()->user()->role->name }}" readonly/>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item text-center">
                                    <div class="row">
                                        <div class="col-sm-6 d-grid">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <a class="" href="{{ route('password.request') }}">Reset Password?</a>
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
