@extends('layouts.layout')
@section('title', 'My Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'briefcase')
@section('sub_head', 'My Appointments')

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
                                <th>Date</th>
                                <th>Time</th>
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
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ date('h:i A', strtotime($appointment->time)) }}</td>
                                    <td class="text-center">

                                        @if ($appointment->status == 0)
                                            <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                <button class="btn btn-link" type="submit"><span><i class="fa-solid fa-square-xmark"
                                                            style="color: red;"></i></span></button>
                                            </form>
                                        @elseif ($appointment->status == 1)
                                            <span class=""><i
                                                    class="fa-solid fa-square-check disabled"></i></span></i>
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

{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
{{-- <script src="js/datatables/datatables-simple-demo.js"></script> --}}
@stop
