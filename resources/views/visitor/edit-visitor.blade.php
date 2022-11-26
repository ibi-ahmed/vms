@extends('layouts.layout')
@section('title', 'Edit Visitor')

@section('content')
@section('sub_head', 'Edit Visitor')
    <div class="row">
        <div class="col-sm-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="/theme/assets/img/illustrations/profiles/profile-1.png" alt="" />
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">Edit Visitor</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter first name" value="Nelson" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter last name" value="Mandela" />
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email Address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter email address" value="nelson@mandela.com" />
                        </div>

                        <!-- Form Group (phone number)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="phonr">Phone Number</label>
                            <input class="form-control" id="phone" type="text" placeholder="Enter phone number" value="0801 2345 678" />
                        </div>
                        <!-- Form Group (company name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="company_name">Company Name</label>
                            <input class="form-control" id="company_name" type="text" placeholder="Enter company name" value="Mandela Corp" />
                        </div>
                        <!-- Submit button-->
                        <button class="btn btn-primary" type="button">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop