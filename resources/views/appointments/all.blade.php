@extends('layouts.layout')
@section('title', 'All Appointments')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
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
                                <th>Phone</th>
                                <th>Department</th>
                                <th>Staff</th>
                                <th>Time</th>
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
                                <td>0801 234 5678</td>
                                <td>DSSRI</td>
                                <td>
                                    Mike Tyson
                                </td>
                                <td>20 Jun 2021 - 10.00am</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Garrett Winters
                                    </div>
                                </td>
                                <td>0801 234 5678</td>
                                <td>ACE Office</td>
                                <td>
                                    Patrice Lumumba
                                </td>
                                <td>20 Jun 2021 - 12.00pm</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Ashton Cox
                                    </div>
                                </td>
                                <td>0801 234 5678</td>
                                <td>IT</td>
                                <td>
                                    Albert Einstein
                                </td>
                                <td>20 Jun 2021 - 11.30am</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Cedric Kelly
                                    </div>
                                </td>
                                <td>0801 234 5678</td>
                                <td>HSE</td>
                                <td>
                                    Nicholas Copernicus
                                </td>
                                <td>20 Jun 2021 - 1.45pm</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>
                                    <div class="d-flex">
                                        <div class=""></div>
                                        Airi Satou
                                    </div>
                                </td>
                                <td>0801 234 5678</td>
                                <td>CS&A</td>
                                <td>
                                    Galileo Galilei
                                </td>
                                <td>20 Jun 2021 - 2.00pm</td>
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