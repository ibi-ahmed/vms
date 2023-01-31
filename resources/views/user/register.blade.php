@extends('layouts.layout')
@section('title', 'Add New User')

@section('content')
@section('icon', 'user-plus')
@section('sub_head', 'Register New User')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card mb-4">
            <div class="card-header text-center">Register New User</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <!-- Form Row-->
                    <div class="row">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="mb-3">
                                <!-- Form Group (name)-->
                                {{-- <div class="col-sm-6"> --}}
                                    <label class="mb-1" for="name">Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Enter name"
                                        required />
                                {{-- </div> --}}
                            </div>

                            <!-- Form Group (Email Address)-->
                            <div class="mb-3">
                                <label class="mb-1" for="email">Email Address</label>
                                <input class="form-control" name="email" type="email"
                                    placeholder="Enter email address" required />
                            </div>

                            <!-- Form Group (Roles)-->
                            <div class="mb-3">
                                <label class="mb-1" for="role_id">Select Role</label>
                                <select class="form-select" name="role_id" aria-label="Default select example" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit button-->
                            <div class="d-grid gap-2 col-sm-6 mx-auto">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
