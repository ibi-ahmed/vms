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
                @if (count($visitors) > 0)
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
                                        <form action="{{ route('visitor.single', $visitor->id) }}" method="GET">
                                            
                                            <button class="btn btn-link" type="submit"><span style="color: green;"><i
                                                class="fa-solid fa-eye"></i></span></button>
                                            </form>
                                            <form action="{{ route('visitor.edit', $visitor->id) }}" method="GET">
                                                <button class="btn btn-link" type="submit"><span style="color: dodgerblue;"><i
                                                            class="fa-solid fa-pen-to-square"></i></span></button>
                                                        </form>
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
