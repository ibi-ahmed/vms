@extends('layouts.layout')
@section('title', 'Visitor Details')

@section('content')
@section('icon', 'user')
@section('sub_head', 'Visitor Details')
    <div class="row">
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header">
                      Visitor Info
                    </div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="/images/avatar/{{ $visitor->photo }}" alt="Profile Pic" />
                        
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{ $visitor->first_name.' '.$visitor->last_name }}</li>
                      <li class="list-group-item">{{ $visitor->company }}</li>
                      <li class="list-group-item">{{ $visitor->email }}</li>
                      <li class="list-group-item">{{ $visitor->phone }}</li>
                      <li class="list-group-item text-center">
                        {{-- <a href="#" class="btn btn-outline-primary">Add Visit</a> --}}
                        @if ($visitor->status == 1)                           
                            <a href="#" class="btn btn-outline-danger">Deactivate Tag</a>
                        @endif
                      </li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        @if (count($visits) > 0)
                        <table class="table table-striped table-hover">
                            <thead class="">
                                <tr>
                                    <th>S/N</th>
                                    <th>Staff</th>
                                    <th>Department</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visits as $visit)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class=""></div>
                                            {{ $visit->user->first_name.' '.$visit->user->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $visit->department->name }}</td>
                                    <td>
                                        {{ date('h:i A', strtotime($visit->created_at)) }}
                                    </td>
                                    <td>{{ date("D M j", strtotime($visit->created_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td class="" colspan="5">PREVIOUS VISITS</td>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                    <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                @endif
                    </div>
                </div>
            </div>
    </div>
@stop