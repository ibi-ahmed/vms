@extends('layouts.layout')
@section('title', 'Appointment')

@section('content')
@section('sub_head', 'Schedule Appointment')
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="card mb-4">
                <div class="card-header">Schedule Visitor Appointment</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="inputFirstName">First Name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter visitor first name" value="" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="mb-1" for="inputLastName">Last Name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter visitor last name" value="" />
                            </div>
                        </div>

                        <!-- Form Group (Company )-->
                        <div class="mb-3">
                            <label class="mb-1" for="phonr">Company</label>
                            <input class="form-control" id="company" type="text" placeholder="Enter company name" value="" />
                        </div>

                        <!-- Form Group (Department)-->
                        <div class="mb-3">
                            <label class="mb-1" for="department">Destination</label>
                            <input class="form-control" id="department" type="text" placeholder="Select Destination" value="" />
                        </div>

                        <!-- Form Group (Date_time)-->
                        <div class="mb-3">
                            <label class="mb-1" for="date_time">Date & Time</label>
                            <input class="form-control" id="date_time" type="datetime-local" value="" />
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