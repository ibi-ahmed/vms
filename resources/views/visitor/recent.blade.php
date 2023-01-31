@extends('layouts.layout')
@section('title', 'Recent Visits')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Recent Visits')

<div class="mt-4 row">
    <div class="col-sm-8 offset-sm-2">
        <div class="card">
            <div class="card-header border-bottom text-center">Recent Visits</div>
            <div class="card-body">
                @if (count($visits) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Date</th>
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
                                        <td>{{ $visit->visitor->phone }}</td>
                                        <td>
                                            {{ $visit->visitor->company }}
                                        </td>
                                        <td>{{ date('D M j - h:i A', strtotime($visit->created_at)) }}</td>
                                        <td>{{ $visit->tag->number }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-sm-flex justify-content-sm">
                                                <form action="{{ route('visitor.single', $visit->visitor->id) }}"
                                                    method="GET">

                                                    <button class="btn btn-sm btn-primary" type="submit">View</button>
                                                </form>
                                                @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4 || Auth::user()->role_id == 2)                                                
                                                <form action="{{ route('tag.deactivate', $visit->visitor->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm"
                                                    type="submit">Deactivate</button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $visits->links() }}
                    </div>
                @else
                    <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                @endif
            </div>
        </div>
    </div>
</div>

@stop
