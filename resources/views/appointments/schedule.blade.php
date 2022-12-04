@extends('layouts.layout')
@section('title', 'Appointment')

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'Schedule Appointment')
<div class="row">
    <div class="col-sm-8 offset-2">
        <div class="card mb-4">
            <div class="card-header">Schedule Visitor Appointment</div>
            <div class="card-body">
                <form method="POST" action="{{ route('appointments.store') }}">
                    @csrf
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="mb-1" for="first_name">First Name</label>
                            <input class="form-control" name="first_name" type="text"
                                placeholder="Enter visitor first name" value="" required/>
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="mb-1" for="last_name">Last Name</label>
                            <input class="form-control" name="last_name" type="text"
                                placeholder="Enter visitor last name" value="" required/>
                        </div>
                    </div>

                    <!-- Form Group (Company )-->
                    <div class="mb-3">
                        <label class="mb-1" for="company">Company</label>
                        <input class="form-control" name="company" type="text" placeholder="Enter company name"
                            value="" required/>
                    </div>

                    <!-- Form Group (Department)-->
                    <div class="mb-3">
                        <label class="mb-1" for="department_id">Select Destination</label>
                        <select class="form-select" name="department_id" aria-label="Default select example" required>
                            {{-- <option selected>Select Destination</option> --}}
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Form Group (Date_time)-->
                    <div class="row gx-3 mb-3">
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="mb-1" for="date">Date</label>
                                <input class="form-control" name="date" type="date" value="" required/>
                            </div>             
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label class="mb-1" for="time">Time</label>
                                <input class="form-control" name="time" type="time" value="" required/>
                            </div>
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
@stop
