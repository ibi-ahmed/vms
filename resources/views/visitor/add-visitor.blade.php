@extends('layouts.layout')
@section('title', 'Add Visitor')

@section('content')
@section('icon', 'user-plus')
@section('sub_head', 'Register Visitor')
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab" href="#register" data-bs-toggle="tab" role="tab" aria-controls="register" aria-selected="true">Register New Visitor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="existing-tab" href="#existing" data-bs-toggle="tab" role="tab" aria-controls="existing" aria-selected="false">Existing Visitor</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <form>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="mb-1" for="first_name">First Name</label>
                                        <input class="form-control" name="first_name" type="text" placeholder="Enter first name" value="" required/>
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="mb-1" for="last_name">Last Name</label>
                                        <input class="form-control" name="last_name" type="text" placeholder="Enter last name" value="" required />
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
                                            <label class="mb-1" for="email">Email Address</label>
                                            <input class="form-control" name="email" type="email" placeholder="Enter email address" value="" required />
                                        </div>
                                        <!-- Form Group (Phone)-->
                                        <div class="col-md-6">
                                            <label class="mb-1" for="phone">Phone Number</label>
                                            <input class="form-control" name="phone" type="text" placeholder="Enter phone number" value="" required/>
                                        </div>
                                    </div>
        
                                <!-- Form Group (company name)-->
                                <div class="mb-3">
                                    <label class="mb-1" for="company_name">Company Name</label>
                                    <input class="form-control" name="company_name" type="text" placeholder="Enter company name" value="" required />
                                </div>
        
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (Department)-->
                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Select Destination</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>                                            
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <select class="form-select" aria-label="Default select example" required>
                                            <option selected>Assign Tag</option>
                                            @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->number }}</option>                                            
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
        
                                <!-- Form Group (Tag)-->
                                <div class="mb-3">
                                    <label class="mb-1" for="staff">Receiving Staff</label>
                                    <input class="form-control" name="staff" type="text" placeholder="Enter staff name" value="" required/>
                                </div>
        
                                <!-- Submit button-->
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button class="btn btn-outline-primary" type="button">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="existing" role="tabpanel" aria-labelledby="existing-tab">
                            <div class="mb-4 row">
                                <div class="col-6 offset-3">
                                    <form action="">
                                        <input class="form-control" type="text" name="" id="" placeholder="Search Visitor...">
                                    </form>
                                </div>
                            </div>
                            <hr>
                            <form class="">
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
        </div>
    </div>
@stop