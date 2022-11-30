@extends('layouts.layout')
@section('title', 'Existing Visitor')

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'Existing Visitor Appointment')
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="card mb-4">
                <div class="card-header text-center">Mike Tyson</div>
                <div class="card-body">
                    <form>

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