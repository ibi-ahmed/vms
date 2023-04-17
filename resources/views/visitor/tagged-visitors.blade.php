@extends('layouts.layout')
@section('title', 'Tagged Visitors')

@section('content')
@section('icon', 'users')
@section('sub_head', 'Tagged Visitors')

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
                @if (count($visits) > 0)
                <div class="table-responsive">
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
                                        <div class="d-grid gap-2 d-sm-flex justify-content-sm">
                                                <form action="{{ route('visitor.single', $visit->visitor->id) }}" method="GET">                                          
                                                    <button class="btn btn-success btn-sm me-sm-2" type="submit">View</button>
                                                </form>
                                                @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4)
                                                <form action="{{ route('visitor.edit', $visit->visitor->id) }}" method="GET">
                                                    <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                                </form>
                                                @endif
                                                @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4 || Auth::user()->role_id == 2)
                                                <form action="{{ route('tag.deactivate', $visit->visitor->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit">Deactivate</button>
                                                </form>
                                                @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- @if (Str::contains(Request::fullUrl(), 'query'))          
                        <tfoot class="text-center">
                            <tr>
                                <td class="" colspan="6">
                                    <a class="btn btn-primary" href="{{ route('tagged.visitors') }}">View All</a>
                                </td>
                            </tr>
                        </tfoot>
                        @endif --}}
                    </table>
                    <div class="text-center">
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
