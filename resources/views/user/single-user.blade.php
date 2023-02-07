@extends('layouts.layout')
@section('title', 'User Details')

@section('content')
@section('icon', 'user')
@section('sub_head', 'User Details')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card mb-4">
            <div class="card-header text-center">
                User Info
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="row text-center">
                        <div class="col-sm-4 mt-2">
                            <label for="name">Name</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text"
                                value="{{ $user->name }}" readonly/>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row text-center">
                        <div class="col-sm-4 mt-2">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-sm-8">
                            <input class="form-control" type="text"
                                value="{{ $user->email }}" readonly/>
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
                             value="{{ $user->role->name }}" readonly/>
                        </div>
                    </div>
                </li>
                <li class="list-group-item text-center">
                    <div class="row">
                        <form action="{{ route('user.edit', $user->id) }}" method="GET">
                        <div class="col-sm-6 offset-sm-3 d-grid">
                            {{-- @can('editUser', $user) --}}
                            <button class="btn btn-primary" type="submit">Edit</button>
                            {{-- @endcan --}}
                        </div>
                    </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@stop
