<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{ public_path('/theme/css/bootstrap.min.css') }}">

<div class="container-fluid">
    <div class="mt-4 row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header border-bottom text-center">All Visitors on {{ date('F jS Y', strtotime($visit_date)) }}</div>
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
                                        <th>Created By</th>
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
                                            <td>{{ DB::table('users')->where('id', $visit->created_by)->pluck('name')->first() }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="text-center">
                                    <tr>
                                        <td class="" colspan="6">NMDPRA VMS REPORT</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <h4 class=" font-monospace mt-2 text-center">No records to show!</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
