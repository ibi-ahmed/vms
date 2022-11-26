@extends('layouts.layout')
@section('title', 'Add Visitor')

@section('content')
@section('sub_head', 'Register Visitor')
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="card mb-4">
                <div class="card-header">Register New Visitor</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" value="" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" value="" />
                            </div>
                        </div>

                            <!-- Form Group (Profile Pic)-->
                            <div class="mb-3">
                                <label class="mb-1" for="photo">Upload Photo</label>
                                <input class="form-control" id="photo" type="file" />
                            </div>

                            <div class="row gx-3 mb-3">
                                <!-- Form Group (Email Address)-->
                                <div class="col-md-6">
                                    <label class="mb-1" for="inputEmailAddress">Email Address</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter email address" value="" />
                                </div>
                                <!-- Form Group (Phone)-->
                                <div class="col-md-6">
                                    <label class="mb-1" for="phone">Phone Number</label>
                                    <input class="form-control" id="phone" type="text" placeholder="Enter phone number" value="" />
                                </div>
                            </div>

                        <!-- Form Group (company name)-->
                        <div class="mb-3">
                            <label class="mb-1" for="company_name">Company Name</label>
                            <input class="form-control" id="company_name" type="text" placeholder="Enter company name" value="" />
                        </div>

                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Department)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="department">Destination</label>
                                <input class="form-control" id="department" type="text" placeholder="Select Destination" value="" />
                            </div>
                            <!-- Form Group (Staff)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="staff">Receiving Staff</label>
                                <input class="form-control" id="staff" type="text" placeholder="Enter staff name" value="" />
                            </div>
                        </div>

                        <!-- Form Group (Tag)-->
                        <div class="mb-3">
                            <label class="mb-1" for="tag">Assign Tag</label>
                            <input class="form-control" id="tag" type="text" placeholder="Visitor Tag" value="" />
                        </div>

                        <!-- Submit button-->
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button class="btn btn-outline-primary" type="button">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop