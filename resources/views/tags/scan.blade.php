@extends('layouts.layout')
@section('title', 'Visit Details')

@section('content')
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
                      <li class="list-group-item">Bill Gates</li>
                      <li class="list-group-item">Microsoft Corp</li>
                      <li class="list-group-item">Visiting - DSSRI</li>
                      <li class="list-group-item">
                        <a href="#" class="btn btn-outline-danger">Deactivate Tag</a>
                      </li>
                    </ul>
                </div>
            </div>
    </div>
@stop