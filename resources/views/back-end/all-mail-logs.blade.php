@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mail Logs</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mail Logs</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Send Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Subject</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($logs as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->date }}</td>
                            <td>{{ $value->from}}</td>
                            <td>{{ $value->to }}</td>
                            <td>{{ $value->subject }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
