@extends('layouts.layout')
@section('title', 'Administrator Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Administrator Dashboard')

<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />

<div class="row">
    <div class="col-6">
        <div class="card h-100">
            <div class="card-header text-center">Monthly Visitors By Department</div>
            <div class="card-body d-flex flex-column justify-content-center">
                <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card h-100">
            <div class="card-header text-center">Most Visited Department</div>
            <div class="card-body">
                <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                        <div class="me-3">
                            <i class="fas fa-circle fa-sm me-1 text-blue"></i>
                            ACE Office
                        </div>
                        <div class="fw-500 text-dark">55%</div>
                    </div>
                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                        <div class="me-3">
                            <i class="fas fa-circle fa-sm me-1 text-purple"></i>
                            DSSRI
                        </div>
                        <div class="fw-500 text-dark">15%</div>
                    </div>
                    <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                        <div class="me-3">
                            <i class="fas fa-circle fa-sm me-1 text-green"></i>
                            CS&A
                        </div>
                        <div class="fw-500 text-dark">30%</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-4 row">
    <div class="col-sm-10 offset-1">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="visits-tab" href="#visits" data-bs-toggle="tab"
                            role="tab" aria-controls="visits" aria-selected="true">Most Recent Visits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="appointments-tab" href="#appointments" data-bs-toggle="tab"
                            role="tab" aria-controls="appointments" aria-selected="false">Most Recent
                            Appointments</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="visits" role="tabpanel"
                        aria-labelledby="visits-tab">
                        @if (count($visits) > 0)
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Date</th>
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
                                    <td>{{ $visit->visitor->email }}</td>
                                    <td>{{ $visit->visitor->phone }}</td>
                                    <td>
                                        {{ $visit->visitor->company }}
                                    </td>
                                    <td>{{ date("D M j - h:i A", strtotime($visit->created_at)) }}</td>
                                    <td>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a> --}}
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a> --}}
                                        <form action="{{ route('visitor.single', $visit->visitor->id) }}" method="GET">

                                            <button class="btn btn-link" type="submit"><span style="color: green;"><i
                                                        class="fa-solid fa-eye"></i></span></button>
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
                    <div class="tab-pane fade show" id="appointments" role="tabpanel"
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
                                                {{ $appointment->staff->first_name . ' ' . $appointment->staff->last_name }}
                                            </td>
                                            <td>{{ $appointment->department->name }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ date('h:i A', strtotime($appointment->time)) }}</td>
                                            <td>
                                                <form action="{{ route('appointments.approve', $appointment->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn btn-link" href="#"><span style="color: green;"><i
                                                        class="fa-solid fa-person-circle-check"></i></span></button>
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
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
<script src="/theme/assets/demo/chart-area-demo.js"></script>
<script src="/theme/assets/demo/chart-bar-demo.js"></script>
<script src="/theme/assets/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
<script src="/theme/js/litepicker.js"></script>
@stop
