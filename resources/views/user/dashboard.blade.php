@extends('layouts.layout')
@section('title', 'User Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'User Dashboard')
<div class="mt-4 row">
    <div class="col-sm-10 offset-1">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="visitors-tab" href="#visitors" data-bs-toggle="tab" role="tab"
                            aria-controls="visitors" aria-selected="true">Active Visitors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="appointments-tab" href="#appointments" data-bs-toggle="tab"
                            role="tab" aria-controls="appointments" aria-selected="false">Appointments</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show" id="visitors" role="tabpanel" aria-labelledby="visitors-tab">
                        @if (count($visits) > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Tag No</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visits as $visit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class=""></div>
                                                    {{ $visit->visitor->first_name . ' ' . $visit->visitor->last_name }}
                                                </div>
                                            </td>
                                            <td>
                                                {{ $visit->visitor->company }}
                                            </td>
                                            <td>{{ $visit->department->name }}</td>
                                            <td>{{ $visit->tag->number }}</td>
                                            <td>
                                                <form action="{{ route('visitor.single', $visit->visitor->id) }}"
                                                    method="GET">

                                                    <button class="btn btn-sm btn-primary" type="submit">View</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                        @endif
                    </div>
                    <div class="tab-pane fade show active" id="appointments" role="tabpanel"
                        aria-labelledby="appointments-tab">
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
                                                {{ $appointment->staff->first_name . ' ' . $appointment->staff->last_name }}
                                            </td>
                                            <td>{{ $appointment->department->name }}</td>
                                            <td>
                                                @if ($appointment->status == 0)
                                                    <button type="button" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Approve
                                                    </button>
                                                    <x-approve-appointment :$appointment :$tags />
                                                @elseif ($appointment->status == 1)
                                                    <button class="btn btn-dark btn-sm disabled">Approved</button>
                                                @elseif ($appointment->status == 2)
                                                    <button class="btn btn-warning btn-sm disabled">Canceled</button>
                                                @elseif ($appointment->status == 3)
                                                    <button class="btn btn-info btn-sm disabled">Pending</button>
                                                @elseif ($appointment->status == 4)
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-bs-toggle="modal" data-bs-target="#tagModal">
                                                        Assign Tag
                                                    </button>
                                                    <x-assign-tag :$appointment :$tags />
                                                @endif
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
    </div>
</div>
@stop
