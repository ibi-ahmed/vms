@extends('layouts.layout')
@section('title', 'Visitor Details')

@section('content')
@section('icon', 'user')
@section('sub_head', 'Visitor Details')
<div class="row">
    <div class="col-sm-4">
        <div class="card mb-4">
            <div class="card-header text-center">
                Visitor Info
            </div>
            <div class="card-body text-center">
                <!-- Profile picture image-->
                <img class="img-account-profile rounded-circle mb-2" src="{{ asset('images/avatar/' . $visitor->photo) }}"
                    alt="Profile Pic" />

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Name - {{ $visitor->first_name . ' ' . $visitor->last_name }}</li>
                <li class="list-group-item">Company - {{ $visitor->company }}</li>
                @if ($visitor->email)
                    <li class="list-group-item">Email - {{ $visitor->email }}</li>
                @endif
                <li class="list-group-item">Phone - {{ $visitor->phone }}</li>
                <li class="list-group-item text-center">
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-end">
                        @can('editVisitor', $visitor)
                            <form action="{{ route('visitor.edit', $visitor->id) }}" method="GET">
                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                            </form>
                        @endcan
                        @if ($visitor->status == 1)
                            @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4 || Auth::user()->role_id == 2)
                                <form action="{{ route('tag.deactivate', $visitor->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm" type="submit">Deactivate</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="card">
            <div class="card-body">
                @if (count($visits) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="">
                                <tr>
                                    <th>S/N</th>
                                    <th>Staff</th>
                                    {{-- <th>Department</th> --}}
                                    <th>Location</th>
                                    <th>Date</th>
                                    <th>Time In</th>
                                    <th>Time Out</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                {{ $visit->user->name }}
                                            </div>
                                        </td>
                                        <td>{{ $visit->location->name . ' / ' . $visit->department->name }}</td>
                                        {{-- <td>{{ $visit->location->name }}</td> --}}
                                        <td>{{ date('F jS, Y', strtotime($visit->created_at)) }}</td>
                                        <td>
                                            {{ date('h:i A', strtotime($visit->created_at)) }}
                                        </td>
                                        @if ($visit->status == 0)
                                            <td>
                                                {{ date('h:i A', strtotime($visit->updated_at)) }}
                                            </td>
                                        @else
                                            <td>
                                                ---------
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td class="" colspan="4">PREVIOUS VISITS</td>
                                    <td class="" colspan="2">
                                        @can('visitorReport', $visitor)
                                            <form action="{{ route('reports.single', $visitor->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-primary btn-sm" type="submit">DOWNLOAD
                                                    REPORT</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="">
                            {{ $visits->links() }}
                        </div>
                    </div>
                @else
                    <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
