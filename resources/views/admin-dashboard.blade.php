@extends('layouts.layout')
@section('title', 'Dashboard')

@section('content')
@section('sub_head', 'Dashboard')

<link href="https://cdn.jsdelivr.net/npm/litepicker/dist/css/litepicker.css" rel="stylesheet" />

    <div class="row">
        <div class="col-6">
            <div class="card h-100">
                <div class="card-header text-center">Monthly Visitors By Department</div>
                <div class="card-body d-flex flex-column justify-content-center">
                    <div class="chart-bar"><canvas id="myBarChart" width="100%" height="30"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card h-100">
                <div class="card-header text-center">Most Visited Department</div>
                <div class="card-body">
                    <div class="chart-pie mb-4"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                            <div class="me-3">
                                <i class="fas fa-circle fa-sm me-1 text-blue"></i>
                                ACE Office
                            </div>
                            <div class="fw-500 text-dark">55%</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                            <div class="me-3">
                                <i class="fas fa-circle fa-sm me-1 text-purple"></i>
                                DSSRI
                            </div>
                            <div class="fw-500 text-dark">15%</div>
                        </div>
                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                            <div class="me-3">
                                <i class="fas fa-circle fa-sm me-1 text-green"></i>
                                CS&A
                            </div>
                            <div class="fw-500 text-dark">30%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 row">
        <div class="col-sm-10 offset-1">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col pt-2">Most Recent Visitors</div>
                        <div class="col">
                            <input class="form-control text-center" type="text" placeholder="Search...">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Last Visit</th>
                                <th>Actions</th>
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
                                <td>
                                    {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="user-management-edit-user.html"><i data-feather="edit"></i></a> --}}
                                    {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#!"><i data-feather="trash-2"></i></a> --}}
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-eye"></i></span></i></a>
                                    <a class="px-3" href="#"><span style="color: dodgerblue;"><i class="fa-solid fa-pen-to-square"></i></span></i></a>
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
                                <td>gwinterse@email.com</td>
                                <td>0801 234 5678</td>
                                <td>
                                    Apple Inc.
                                </td>
                                <td>20 Jun 2021</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-eye"></i></span></i></a>
                                    <a class="px-3" href="#"><span style="color: dodgerblue;"><i class="fa-solid fa-pen-to-square"></i></span></i></a>
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
                                <td>ashtonc@email.com</td>
                                <td>0801 234 5678</td>
                                <td>
                                    NUPRC
                                </td>
                                <td>20 Jun 2021</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-eye"></i></span></i></a>
                                    <a class="px-3" href="#"><span style="color: dodgerblue;"><i class="fa-solid fa-pen-to-square"></i></span></i></a>
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
                                <td>cedrickel@email.com</td>
                                <td>0801 234 5678</td>
                                <td>
                                    NNPC Limited
                                </td>
                                <td>20 Jun 2021</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-eye"></i></span></i></a>
                                    <a class="px-3" href="#"><span style="color: dodgerblue;"><i class="fa-solid fa-pen-to-square"></i></span></i></a>
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
                                <td>asatou@email.com</td>
                                <td>0801 234 5678</td>
                                <td>
                                    Ministry of Petroleum Resources
                                </td>
                                <td>20 Jun 2021</td>
                                <td>
                                    <a href="#"><span style="color: green;"><i class="fa-solid fa-eye"></i></span></i></a>
                                    <a class="px-3" href="#"><span style="color: dodgerblue;"><i class="fa-solid fa-pen-to-square"></i></span></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" crossorigin="anonymous"></script>
<script src="/theme/assets/demo/chart-area-demo.js"></script>
<script src="/theme/assets/demo/chart-bar-demo.js"></script>
<script src="/theme/assets/demo/chart-pie-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js" crossorigin="anonymous"></script>
<script src="/theme/js/litepicker.js"></script>
@stop