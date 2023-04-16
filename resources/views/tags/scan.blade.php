@extends('layouts.layout')
@section('title', 'Visit Details')

@section('content')
@section('icon', 'tag')
@section('sub_head', 'Visit Details')
<div class="row">
    <div class="col-sm-6 offset-sm-3">
        <div class="card mb-4 text-center">
            <div class="card-header text-center">
                Visitor Info
            </div>
            @if (isset($visit))
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="/images/avatar/{{ $visit->visitor->photo }}"
                        alt="" />

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Name - {{ $visit->visitor->first_name . ' ' . $visit->visitor->last_name }}</li>
                    <li class="list-group-item">Company - {{ $visit->visitor->company }}</li>
                    <li class="list-group-item">Department - {{ $visit->department->name }}</li>
                    <li class="list-group-item">Location - {{ $visit->location->name }}</li>
                    <li class="list-group-item">Staff - {{ $visit->user->name }}</li>
                    @if (Auth::check()) 
                        @if (Auth::user()->role_id == 5 || Auth::user()->role_id == 4 || Auth::user()->role_id == 2)
                        <li class="list-group-item">
                            <form action="{{ route('tag.deactivate', $visit->visitor->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm" type="submit">Deactivate</button>
                            </form>
                        </li>
                        @endif
                    @endif
                </ul>
            @else
                <div class="card-body text-center">
                    <h2>Tag is unattached</h2>
                  </div>
            @endif
    </div>
</div>
</div>
@stop
