@extends('layouts.layout')
@section('title', 'Add New User')

@section('content')
@section('icon', 'user-plus')
@section('sub_head', 'Register New User')
<div class="row">
    <div class="col-sm-8 offset-2">
        <div class="card mb-4">
            <div class="card-header">Register New User</div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="mb-1" for="first_name">First Name</label>
                            <input class="form-control" name="first_name" type="text" placeholder="Enter first name"
                                required />
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="mb-1" for="last_name">Last Name</label>
                            <input class="form-control" name="last_name" type="text" placeholder="Enter last name"
                                required />
                        </div>
                    </div>

                    <!-- Form Group (Email Address)-->
                    <div class="mb-3">
                        <label class="mb-1" for="email">Email Address</label>
                        <input class="form-control" name="email" type="email"
                            placeholder="Enter email address" required />
                    </div>

                    <!-- Submit button-->
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
