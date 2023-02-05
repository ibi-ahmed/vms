@extends('layouts.layout')
@section('title', 'All Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'All Appointments')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header border-bottom text-center">All Appointments</div>
            <div class="card-body">
                @if (count($appointments) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Staff</th>
                                <th>Department</th>
                                <th>Location</th>
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
                                        {{ $appointment->staff->name}}
                                    </td>
                                    <td>{{ $appointment->department->name }}</td>
                                    <td>{{ $appointment->location->name }}</td>
                                    <td>
                                        @if ($appointment->status == 0)
                                            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop">
                                                Approve
                                            </button>
                                            <x-approve-appointment :$appointment :$tags />
                                        @elseif ($appointment->status == 1)
                                            <button class="btn btn-info btn-sm disabled">Approved</button>
                                        @elseif ($appointment->status == 2)
                                            <button class="btn btn-warning btn-sm disabled">Canceled</button>
                                        @elseif ($appointment->status == 3)
                                            <button class="btn btn-info btn-sm disabled">Pending</button>
                                        @elseif ($appointment->status == 4)
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#tagModal">
                                                Assign Tag
                                            </button>
                                            <x-assign-tag :$appointment :$tags />
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $appointments->links() }}
                    </div>
                </div>
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
