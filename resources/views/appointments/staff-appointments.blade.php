@extends('layouts.layout')
@section('title', $staff->name.'\'s Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'bookmark')
@section('sub_head', $staff->name.'\'s Appointments')

<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header border-bottom text-center">{{ $staff->name }}</div>
            <div class="card-body">
                @if (count($appointments) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Created By</th>
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
                                            {{ $appointment->first_name.' '.$appointment->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $appointment->company }}</td>
                                    <td>{{ $appointment->location->name.' / '.$appointment->department->name }}</td>
                                    <td>{{ DB::table('users')->where('id', $appointment->created_by)->pluck('name')->first() }}</td>
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
                        @if (Str::contains(Request::fullUrl(), 'query'))          
                        <tfoot class="text-center">
                            <tr>
                                <td class="" colspan="9">
                                    <a class="btn btn-primary" href="{{ route('appointments.all') }}">View All</a>
                                </td>
                            </tr>
                        </tfoot>
                        @endif
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
