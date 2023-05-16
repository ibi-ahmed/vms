@extends('layouts.layout')
@section('title', 'Appointment')

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'Schedule Appointment')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card mb-4">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="new_visitor-tab" href="#new_visitor" data-bs-toggle="tab" role="tab"
                            aria-controls="new_visitor" aria-selected="true">Schedule New Visitor Appointment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="existing_visitor-tab" href="#existing_visitor" data-bs-toggle="tab" role="tab"
                            aria-controls="existing_visitor" aria-selected="false">Existing Visitor Appointment</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="new_visitor" role="tabpanel"
                        aria-labelledby="new_visitor-tab">
                        <form method="POST" action="{{ route('appointments.store') }}">
                            @csrf
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="first_name">First Name *</label>
                                    <input class="form-control" name="first_name" type="text"
                                        placeholder="Enter visitor first name" value="" required/>
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="last_name">Last Name *</label>
                                    <input class="form-control" name="last_name" type="text"
                                        placeholder="Enter visitor last name" value="" required/>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Company)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="company">Company *</label>
                                <input class="form-control" name="company" type="text" placeholder="Enter company name"
                                    value="" required/>
                                </div>
                                <!-- Form Group (date)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="date">Date of Appointment *</label>
                                    <input class="form-control" name="date" type="date"
                                         value="" required/>
                                </div>
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Phone)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="phone">Phone Number *</label>
                                    <input class="form-control" name="phone" type="text"
                                        placeholder="Enter phone number" value="" required />
                                </div>

                                <!-- Form Group (Email Address)-->
                                <div class="col-sm-6">
                                    <label class="mb-1" for="email">Email Address</label>
                                    <input class="form-control" name="email" type="email"
                                        placeholder="Enter email address : optional" value=""/>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- Form Group (Department)-->
                            <div class="mb-3">
                                <label class="mb-1" for="department_id">Select Destination *</label>
                                <select class="form-select" name="department_id" aria-label="Default select example" required>
                                    <option selected>Select Destination</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Form Group (Location)-->
                            <div class="mb-3">
                                <label class="mb-1" for="location_id">Select Location *</label>
                                <select class="form-select" name="location_id" aria-label="Default select example" required>
                                    <option selected>Select Destination</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                                </div>
                            </div>
        
                            <!-- Submit button-->
                            <div class="d-grid gap-2 col-sm-6 mx-auto">
                                <button class="btn btn-outline-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade show" id="existing_visitor" role="tabpanel" aria-labelledby="existing_visitor-tab">
                        <form method="POST" action="{{ route('existing_visitor_appointments.store') }}">
                            @csrf
                            <div class="mb-4 row">
                                <div class="col-sm-6">
                                    <label class="mb-1" for="vis_id">Select Visitor *</label>
                                    <visitor-search-component></visitor-search-component>
                                </div>
                                <div class="col-sm-6">
                                    <label class="" for="date">Date of Appointment *</label>
                                    <input class="form-control" name="date" type="date"
                                         value="" required/>
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <div class="col-sm-6">
                                    <label class="mb-1" for="department_id">Select Destination *</label>
                                    <select class="form-select" name="department_id"
                                        aria-label="Default select example" required>
                                        <option selected>Select Destination</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mb-1" for="location_id">Select Location *</label>
                                    <select class="form-select" name="location_id"
                                        aria-label="Default select example" required>
                                        <option selected>Select Destination</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Submit button-->
                            <div class="d-grid gap-2 col-sm-6 mx-auto">
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
