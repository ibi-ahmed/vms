<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="{{ public_path('/theme/css/bootstrap.min.css') }}">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script> --}}

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 offset-sm-2 mt-5">
            <div class="card">
                <div class="card-body">
                    @if (count($visits) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="">
                                    <tr>
                                        <td class="text-center" colspan="6">
                                            {{ $visitor->first_name . ' ' . $visitor->last_name . ' - PREVIOUS VISITS' }}</td>
                                    </tr>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Staff</th>
                                        {{-- <th>Department</th> --}}
                                        <th>Location</th>
                                        <th>Date</th>
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
                                                    {{ $visit->user->name }}
                                                </div>
                                            </td>
                                            {{-- <td>{{ $visit->department->name }}</td> --}}
                                            <td>{{ $visit->location->name . ' / ' . $visit->department->name }}</td>
                                            <td>{{ date('F jS, Y', strtotime($visit->created_at)) }}</td>
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
{{-- </body>
</html> --}}
