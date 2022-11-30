@extends('layouts.layout')
@section('title', 'All Visitors')

{{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}

@section('content')
@section('icon', 'users')
@section('sub_head', 'All Visitors')

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
                            <tr>
                                <td>6</td>
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
                                <td>7</td>
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
                                <td>8</td>
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
                                <td>9</td>
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
                                <td>10</td>
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
    
{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
{{-- <script src="js/datatables/datatables-simple-demo.js"></script> --}}
@stop