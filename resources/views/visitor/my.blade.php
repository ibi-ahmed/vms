@extends('layouts.layout')
@section('title', 'My Visitors')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'My Visitors')
<div class="mt-4 row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header border-bottom text-center">My Visitors</div>
            <div class="card-body">
                        @if (count($visits) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Last Visit</th>
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
                                            <td>{{ date('F jS Y', strtotime($visit->updated_at)) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                {{ $visits->links() }}
                            </div>
                        </div>
                        @else
                            <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                        @endif
                    {{-- </div> --}}
                    {{-- <div class="tab-pane fade show active" id="appointments" role="tabpanel"
                        aria-labelledby="appointments-tab">
                        @if (count($appointments) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Company</th>
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
                                            <td class="">

                                                @if ($appointment->status == 0)
                                                    <form action="{{ route('appointments.cancel', $appointment->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm"
                                                            type="submit">Cancel</button>
                                                    </form>
                                                @elseif ($appointment->status == 1)
                                                    <button class="btn btn-info btn-sm disabled">Approved</button>
                                                @elseif ($appointment->status == 2)
                                                    <button class="btn btn-warning btn-sm disabled">Canceled</button>
                                                @elseif ($appointment->status == 3)
                                                    <form
                                                        action="{{ route('appointments.staff-approve', $appointment->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-success btn-sm"
                                                            type="submit">Approve</button>
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
                    </div> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
@stop
