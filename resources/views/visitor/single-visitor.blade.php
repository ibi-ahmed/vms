@extends('layouts.layout')
@section('title', 'Visitor Details')

@section('content')
@section('sub_head', 'Visitor Details')
    <div class="row">
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header">
                      Visitor Info
                    </div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="/theme/assets/img/illustrations/profiles/profile-1.png" alt="" />
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-2">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        {{-- <button class="btn btn-primary" type="button">Upload new image</button> --}}
                        
                        <!-- Form Group (Profile Pic)-->
                        <div class="">
                            <label class="" for="photo">Upload New Photo</label>
                            <input class="form-control" id="photo" type="file" />
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Bill Gates</li>
                      <li class="list-group-item">Microsoft Corp</li>
                      <li class="list-group-item">bill@gates.com</li>
                      <li class="list-group-item">0801 234 5678</li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead class="">
                                <tr>
                                    <th>S/N</th>
                                    <th>Staff</th>
                                    <th>Department</th>
                                    <th>Time</th>
                                    <th>Date</th>
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
                                    <td>ACE Office</td>
                                    <td>
                                        9.00am
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
                                    <td>DSSRI</td>
                                    <td>12.00pm</td>
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
                                    <td>CS&A</td>
                                    <td>2.00pm</td>
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
                                    <td>HSE</td>
                                    <td>11.45am</td>
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
                                    <td>IT</td>
                                    <td>10.30am</td>
                                    <td>20 Jun 2021</td>
                                </tr>
                            </tbody>
                            <tfoot class="text-center">
                                <tr>
                                    <td class="" colspan="5">PREVIOUS VISITS</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@stop