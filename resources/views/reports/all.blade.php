<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{ public_path('/theme/css/bootstrap.min.css') }}">

<div class="container-fluid">
    <div class="mt-4 row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header border-bottom text-center">All Visitors on {{ date('F jS Y', strtotime($visit_date)) }}</div>
                <br>
                <div class="card-body">
                    @if (count($visits) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        {{-- <th>Email</th> --}}
                                        <th>Company</th>
                                        <th>Staff</th>
                                        {{-- <th>Approved By</th> --}}
                                        <th>Time In</th>
                                        <th>Time Out</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visits as $visit)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <div class=""></div>
                                                    {{ $visit->visitor->first_name . ' ' . $visit->visitor->last_name }}
                                                </div>
                                            </td>
                                            <td>{{ $visit->visitor->phone }}</td>
                                            {{-- <td>{{ $visit->visitor->email }}</td> --}}
                                            <td>
                                                {{ $visit->visitor->company }}
                                            </td>
                                            <td>
                                                {{ $visit->user->name }}
                                            </td>
                                            {{-- <td>{{ DB::table('users')->where('id', $visit->created_by)->pluck('name')->first() }}
                                            </td> --}}
                                            <td>
                                                {{ date('h:i A', strtotime($visit->created_at)) }}
                                            </td>
                                            @if ($visit->status == 2)
                                                <td>
                                                    {{ date('h:i A', strtotime($visit->updated_at)) }}
                                                </td>
                                            @else
                                                <td>
                                                    ---------
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-center">
                                    <tr>
                                        <td class="" colspan="7">NMDPRA VMS REPORT</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <h4 class="fw-bold font-monospace mt-2 text-center">No records to show!</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
