@extends('layouts.layout')
@section('title', 'Today\'s Visits')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Today\'s Visits')

<div class="mt-4 row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header border-bottom text-center">Today's Visits</div>
            <div class="card-body">
                @if (count($visits) > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Staff</th>
                                    <th>Location</th>
                                    {{-- <th>Date</th> --}}
                                    <th>Tag No</th>
                                    <th>Created By</th>
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
                                        {{-- <td>{{ $visit->visitor->phone }}</td> --}}
                                        <td>{{ $visit->user->name }}</td>
                                        <td>
                                            {{ $visit->location->name.' / '.$visit->department->name }}
                                        </td>
                                        {{-- <td>{{ date('F jS, Y', strtotime($visit->created_at)) }}</td> --}}
                                        <td>{{ $visit->tag->number }}</td>
                                        <td>{{ DB::table('users')->where('id', $visit->created_by)->pluck('name')->first() }}</td>
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
