@extends('layouts.layout')
@section('title', 'Edit Visitor')

@section('content')
@section('icon', 'user')
@section('sub_head', 'Edit Visitor')
    <div class="row">
        <div class="col-sm-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="/images/avatar/{{ $visitor->photo }}" alt="" />
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input class="form-control" type="file" name="photo" form="editForm">
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card mb-4">
                <div class="card-header">Edit Visitor</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('visitor.editVisitor', $visitor->id) }}" id="editForm" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="first_name">First Name</label>
                                <input class="form-control" name="first_name" type="text" placeholder="Enter first name" value="{{ $visitor->first_name }}" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="last_name">Last Name</label>
                                <input class="form-control" name="last_name" type="text" placeholder="Enter last name" value="{{ $visitor->last_name }}" />
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email Address</label>
                            <input class="form-control" name="email" type="email" placeholder="Enter email address" value="{{ $visitor->email }}" />
                        </div>

                        <!-- Form Group (phone number)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="phone">Phone Number</label>
                            <input class="form-control" name="phone" type="text" placeholder="Enter phone number" value="{{ $visitor->phone }}" />
                        </div>
                        <!-- Form Group (company name)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="company">Company Name</label>
                            <input class="form-control" name="company" type="text" placeholder="Enter company name" value="{{ $visitor->company }}" />
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