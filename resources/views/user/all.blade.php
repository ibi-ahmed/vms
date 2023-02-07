@extends('layouts.layout')
@section('title', 'All Users')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'users')
@section('sub_head', 'All Users')

<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col-4 offset-4">
                        <form action="{{ route('search.users') }}">
                            <div class="input-group">
                                <input class="form-control text-center" name="query" type="text" placeholder="Search User..." aria-describedby="button-addon" required>
                                <button class="btn btn-sm btn-primary" type="submit" id="button-addon">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($users) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Designation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class=""></div>
                                            {{ $user->name }}
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-sm-flex justify-content-sm">
                                            @can('singleUser', $user)
                                            <form action="{{ route('user.single', $user->id) }}" method="GET">
                                                <button class="btn btn-sm btn-primary" type="submit">View</button>
                                            </form>
                                            @endcan
                                            @can('editUser', $user)                                         
                                            <form action="{{ route('user.edit', $user->id) }}" method="GET">
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
                                    <a class="btn btn-primary" href="{{ route('users.all') }}">View All</a>
                                </td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                    <div class="">
                        {{ $users->links() }}
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
