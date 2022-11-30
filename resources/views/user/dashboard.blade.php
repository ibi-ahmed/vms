@extends('layouts.layout')
@section('title', 'User Dashboard')

@section('content')
@section('sub_head', 'User Dashboard')
    <div class="mt-4 row">
        <div class="col-sm-10 offset-1">
            <div class="card">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="visitors-tab" href="#visitors" data-bs-toggle="tab" role="tab" aria-controls="visitors" aria-selected="true">Active Visitors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="appointments-tab" href="#appointments" data-bs-toggle="tab" role="tab" aria-controls="appointments" aria-selected="false">Appointments</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="visitors" role="tabpanel" aria-labelledby="visitors-tab">                
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Company</th>
                                        <th>Department</th>
                                        <th>Tag No</th>
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
                                        <td>
                                            Microsoft Corp.
                                        </td>
                                        <td>DSSRI</td>
                                        <td>12</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Garrett Winters
                                            </div>
                                        </td>
                                        <td>
                                            Apple Inc.
                                        </td>
                                        <td>HSEC</td>
                                        <td>05</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Ashton Cox
                                            </div>
                                        </td>
                                        <td>
                                            NUPRC
                                        </td>
                                        <td>ACE Office</td>
                                        <td>24</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Cedric Kelly
                                            </div>
                                        </td>
                                        <td>
                                            NNPC Limited
                                        </td>
                                        <td>ERSP</td>
                                        <td>31</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Airi Satou
                                            </div>
                                        </td>
                                        <td>
                                            Ministry of Petroleum Resources
                                        </td>
                                        <td>IT</td>
                                        <td>06</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade show" id="appointments" role="tabpanel" aria-labelledby="appointments-tab">                
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
        </div>
    </div>
@stop