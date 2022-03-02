@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Mail Delivery</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Mail Delivery Report</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Patient Name</th>
                        <th>Patient Email</th>
                        <th>Delivery Status</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($check as $value)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->patient_name }}</td>
                            <td>{{ $value->email}}</td>
                            <td>
                                @if ($value->delivery_status === 'Success')
                                    <span class="btn btn-success btn-sm">Success</span>
                                @else($value->delivery_status === 'Failed')
                                    <span class="btn btn-danger btn-sm">Failed</span>
                                @endif
                            </td>
                            <td>{{ $value->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
