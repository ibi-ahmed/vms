@extends('layouts.layout')
@section('title', 'All Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'bookmark')
@section('sub_head', 'All Appointments')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <input class="form-control text-center" type="text" placeholder="Search...">
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th>Staff</th>
                                <th>Department</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Tiger Nixon
                                    </div>
                                </td>
                                <td>NUPRC</td>
                                <td>
                                    Mike Tyson
                                </td>
                                <td>DSSRI</td>
                                <td>10.00am</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-person-circle-check"></i></span></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Garrett Winters
                                    </div>
                                </td>
                                <td>PTDF</td>
                                <td>
                                    Patrice Lumumba
                                </td>
                                <td>ACE Office</td>
                                <td>12.00pm</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-person-circle-check"></i></span></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Ashton Cox
                                    </div>
                                </td>
                                <td>NCDMB</td>
                                <td>
                                    Albert Einstein
                                </td>
                                <td>IT</td>
                                <td>11.30am</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-person-circle-check"></i></span></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Cedric Kelly
                                    </div>
                                </td>
                                <td>NNPC Ltd</td>
                                <td>
                                    Nicholas Copernicus
                                </td>
                                <td>HSE</td>
                                <td>1.45pm</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-person-circle-check"></i></span></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Airi Satou
                                    </div>
                                </td>
                                <td>Google Inc.</td>
                                <td>
                                    Galileo Galilei
                                </td>
                                <td>CS&A</td>
                                <td>2.00pm</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-person-circle-check"></i></span></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
{{-- <script src="js/datatables/datatables-simple-demo.js"></script> --}}
@stop