@extends('layouts.layout')
@section('title', 'Visit Details')

@section('content')
@section('icon', 'tag')
@section('sub_head', 'Visit Details')
    <div class="row">
            <div class="col-4 offset-4">
                <div class="card mb-4">
                    <div class="card-header">
                      Visitor Info
                    </div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="/theme/assets/img/illustrations/profiles/profile-1.png" alt="" />
                        
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">{{ $visit->visitor->first_name.' '.$visit->visitor->last_name }}</li>
                      <li class="list-group-item">{{ $visit->visitor->company }}</li>
                      <li class="list-group-item">Department - {{ $visit->department->name }}</li>
                      <li class="list-group-item">Staff - {{ $visit->user->first_name.' '.$visit->user->last_name }}</li>
                      <li class="list-group-item">
                        <a href="#" class="btn btn-outline-danger">Deactivate Tag</a>
                      </li>
                    </ul>
                </div>
            </div>
    </div>
@stop