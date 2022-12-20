@extends('layouts.layout')
@section('title', 'Tagged Visitors')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'users')
@section('sub_head', 'Tagged Visitors')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                @if (count($visits) > 0)
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Company</th>
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
                                    <td>{{ $visit->tag->number }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md">
                                                <form action="{{ route('visitor.single', $visit->visitor->id) }}" method="GET">                                          
                                                    <button class="btn btn-success btn-sm me-md-2" type="submit">View</button>
                                                </form>
                                                <form action="{{ route('visitor.edit', $visit->visitor->id) }}" method="GET">
                                                    <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                                </form>
                                                <form action="{{ route('tag.deactivate', $visit->visitor->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit">Deactivate</button>
                                                </form>
                                        </div>
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

@stop
