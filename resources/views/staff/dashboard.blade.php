@extends('layouts.layout')
@section('title', 'Staff Dashboard')

@section('content')
@section('icon', 'activity')
@section('sub_head', 'Staff Dashboard')
    <div class="mt-4 row">
        <div class="col-sm-10 offset-1">
            <div class="card">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="visitors-tab" href="#visitors" data-bs-toggle="tab" role="tab" aria-controls="visitors" aria-selected="true">My Visitors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="appointments-tab" href="#appointments" data-bs-toggle="tab" role="tab" aria-controls="appointments" aria-selected="false">My Appointments</a>
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
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Company</th>
                                        <th>Last Visit</th>
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
                                        <td>tiger@email.com</td>
                                        <td>0801 234 5678</td>
                                        <td>
                                            Microsoft Corp.
                                        </td>
                                        <td>20 Jun 2021</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Garrett Winters
                                            </div>
                                        </td>
                                        <td>gwinterse@email.com</td>
                                        <td>0801 234 5678</td>
                                        <td>
                                            Apple Inc.
                                        </td>
                                        <td>20 Jun 2021</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Ashton Cox
                                            </div>
                                        </td>
                                        <td>ashtonc@email.com</td>
                                        <td>0801 234 5678</td>
                                        <td>
                                            NUPRC
                                        </td>
                                        <td>20 Jun 2021</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Cedric Kelly
                                            </div>
                                        </td>
                                        <td>cedrickel@email.com</td>
                                        <td>0801 234 5678</td>
                                        <td>
                                            NNPC Limited
                                        </td>
                                        <td>20 Jun 2021</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class=""></div>
                                                Airi Satou
                                            </div>
                                        </td>
                                        <td>asatou@email.com</td>
                                        <td>0801 234 5678</td>
                                        <td>
                                            Ministry of Petroleum Resources
                                        </td>
                                        <td>20 Jun 2021</td>
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
                                        <td>NNPC Limited</td>
                                        <td>20 Jun 2021 - 10.00am</td>
                                        <td>
                                            <a href="#"><span style="color: red;"><i class="fa-solid fa-square-xmark"></i></span></i></a>
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
                                        <td>NUPRC</td>
                                        <td>20 Jun 2021 - 12.00pm</td>
                                        <td>
                                            <a href="#"><span style="color: red;"><i class="fa-solid fa-square-xmark"></i></span></i></a>
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
                                        <td>NITDA</td>
                                        <td>20 Jun 2021 - 11.30am</td>
                                        <td>
                                            <a href="#"><span style="color: red;"><i class="fa-solid fa-square-xmark"></i></span></i></a>
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
                                        <td>NCDMB</td>
                                        <td>20 Jun 2021 - 1.45pm</td>
                                        <td>
                                            <a href="#"><span style="color: red;"><i class="fa-solid fa-square-xmark"></i></span></i></a>
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
                                        <td>PTDF</td>
                                        <td>20 Jun 2021 - 2.00pm</td>
                                        <td>
                                            <a href="#"><span style="color: red;"><i class="fa-solid fa-square-xmark"></i></span></i></a>
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