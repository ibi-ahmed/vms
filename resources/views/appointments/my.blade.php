@extends('layouts.layout')
@section('title', 'My Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'briefcase')
@section('sub_head', 'My Appointments')

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header border-bottom text-center">My Appointments</div>
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
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $index => $appointment)
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
                                    <td>{{ DB::table('users')->where('id', $appointment->created_by)->pluck('name')->first() }}</td>
                                    <td class="">

                                        @if ($appointment->status == 0)
                                            <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Cancel</button>
                                            </form>
                                        @elseif ($appointment->status == 1)
                                            <button class="btn btn-info btn-sm disabled">Approved</button>
                                        @elseif ($appointment->status == 2)
                                            <button class="btn btn-warning btn-sm disabled">Canceled</button>
                                        @elseif ($appointment->status == 3)
                                            <form action="{{ route('appointments.staff-approve', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn btn-success btn-sm" type="submit">Approve</button>
                                            </form>
                                        @elseif ($appointment->status == 4)
                                            <button class="btn btn-dark btn-sm disabled">Pending</button>
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
