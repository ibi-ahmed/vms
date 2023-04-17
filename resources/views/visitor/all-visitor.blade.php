@extends('layouts.layout')
@section('title', 'All Visitors')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'users')
@section('sub_head', 'All Visitors')

<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                        <form action="{{ route('visitor.all') }}">
                            <div class="input-group">
                                <input class="form-control text-center" name="query" type="text" placeholder="Search Visitor..." aria-describedby="button-addon" required>
                                <button class="btn btn-sm btn-primary" type="submit" id="button-addon">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($visitors) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($visitors as $visitor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class=""></div>
                                            {{ $visitor->first_name . ' ' . $visitor->last_name }}
                                        </div>
                                    </td>
                                    <td>{{ $visitor->email }}</td>
                                    <td>{{ $visitor->phone }}</td>
                                    <td>
                                        {{ $visitor->company }}
                                    </td>
                                    <td>
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a> --}}
                                        {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a> --}}
                                    <div class="d-grid gap-2 d-sm-flex justify-content-sm">
                                        <form action="{{ route('visitor.single', $visitor->id) }}" method="GET">
                                            <button class="btn btn-sm btn-primary" type="submit">View</button>
                                        </form>
                                        @can('editVisitor', $visitor)                                         
                                        <form action="{{ route('visitor.edit', $visitor->id) }}" method="GET">
                                            <button class="btn btn-sm btn-info" type="submit">Edit</button>
                                        </form>
                                        @endcan
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        @if (Str::contains(Request::fullUrl(), 'query'))          
                        <tfoot class="text-center">
                            <tr>
                                <td class="" colspan="6">
                                    <a class="btn btn-primary" href="{{ route('visitor.all') }}">View All</a>
                                </td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                    <div class="">
                        {{ $visitors->links() }}
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
