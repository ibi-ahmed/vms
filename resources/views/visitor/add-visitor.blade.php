@extends('layouts.layout')
@section('title', 'Create Appointment')

@section('content')
@section('icon', 'user-plus')
@section('sub_head', 'Create Appointment')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card mb-4">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="register-tab" href="#register" data-bs-toggle="tab" role="tab"
                            aria-controls="register" aria-selected="true">Create New Visitor Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="existing-tab" href="#existing" data-bs-toggle="tab" role="tab"
                            aria-controls="existing" aria-selected="false">Existing Visitor Appointment</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="register" role="tabpanel"
                        aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('visitor.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="first_name">First Name</label>
                                    <input class="form-control" name="first_name" type="text"
                                        placeholder="Enter first name" value="" required />
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="last_name">Last Name</label>
                                    <input class="form-control" name="last_name" type="text"
                                        placeholder="Enter last name" value="" required />
                                </div>
                            </div>

                            <!-- Form Group (Profile Pic)-->
                            <div class="mb-3">
                                <label class="mb-1" for="photo">Upload Photo</label>
                                <input class="form-control" name="photo" type="file" />
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Phone)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="phone">Phone Number</label>
                                    <input class="form-control" name="phone" type="text"
                                        placeholder="Enter phone number" value="" required />
                                </div>

                                <!-- Form Group (Email Address)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="email">Email Address</label>
                                    <input class="form-control" name="email" type="email"
                                        placeholder="Enter email address : optional" value="" />
                                </div>
                                
                            </div>

                            <!-- Form Group (company name)-->
                            <div class="mb-3">
                                <label class="mb-1" for="company">Company Name</label>
                                <input class="form-control" name="company" type="text"
                                    placeholder="Enter company name" value="" required />
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Department)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="department_id">Select Destination</label>
                                    <select class="form-select" name="department_id" aria-label="Default select example"
                                        required>
                                        {{-- <option selected>Select Destination</option> --}}
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mb-1" for="staff_email">Receiving Staff</label>
                                <staff-search-component></staff-search-component>
                                </div>
                            </div>

                            <!-- Submit button-->
                            <div class="d-grid gap-2 col-sm-6 mx-auto">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="existing" role="tabpanel" aria-labelledby="existing-tab">
                        <form method="POST" action="{{ route('visit.store') }}">
                            @csrf
                            <div class="mb-4 row">
                                <div class="col-6 offset-3">
                                    <label class="mb-1" for="vis_id">Select Visitor</label>
                                    <visitor-search-component></visitor-search-component>
                                </div>
                            </div><hr>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Department)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="department_id">Select Destination</label>
                                    <select class="form-select" name="department_id"
                                        aria-label="Default select example" required>
                                        {{-- <option selected>Select Destination</option> --}}
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label class="mb-1" for="staff_id">Receiving Staff</label>
                                <staff-search-component></staff-search-component>
                                </div>
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
    </div>
</div>
@stop
