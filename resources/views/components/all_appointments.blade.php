@extends('layouts.layout')
@section('title', 'All Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'All Appointments')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @if (count($appointments) > 0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Staff</th>
                                <th>Department</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class=""></div>
                                            {{ $appointment->first_name }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <div class=""></div>
                                            {{ $appointment->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $appointment->company }}</td>
                                    <td>
                                        {{ $appointment->staff->first_name.' '.$appointment->staff->last_name }}
                                    </td>
                                    <td>{{ $appointment->department->name }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ date('h:i A', strtotime($appointment->time)) }}</td>
                                    <td>
                                        <a href="#"><span style="color: green;"><i
                                                    class="fa-solid fa-person-circle-check"></i></span></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
{{-- <script src="js/datatables/datatables-simple-demo.js"></script> --}}
@stop
