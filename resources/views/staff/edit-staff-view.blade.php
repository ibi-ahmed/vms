@extends('layouts.layout')
@section('title', $staff->name . ' Profile')

@section('content')
@section('icon', 'activity')
@section('sub_head', $staff->name . ' Profile')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header text-center">Edit Staff Role</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <form action="{{ route('staff.edit.role') }}" method="POST">
                            @csrf
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" name="name" type="text"
                                             value="{{ $staff->name }}" readonly/>
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
                                                value="{{ $staff->email }}" readonly/>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row text-center">
                                        <div class="col-sm-4 mt-2">
                                            <label for="name">Designation</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <select class="form-select" name="role_id" aria-label="Default select example" required>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
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
