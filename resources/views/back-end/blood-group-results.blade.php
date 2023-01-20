@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="mb-2 text-gray-800 h3">Blood Group Test Results</h1>

<!-- DataTales Example -->
<div class="mb-4 shadow card">
    <div class="py-3 card-header">
        <h6 class="m-0 font-weight-bold text-primary">All Blood Group Test</h6>
    </div>
    @php
        $now = new DateTime();
        $future_date = new DateTime('2022-02-21 12:00:00');

        $interval = $future_date->diff($now);

        $pack = ($interval->format("%a") * 24) + $interval->format("%h");
        //print_r($now->format('Y-m-d H:i:s'));
        $level = "Express";
        $lamp = "Normal";
        //print_r($pack);
        if($level && $pack <= 6)
        {
            //print_r("Express User");
        }
        elseif($lamp && $pack >= 12 && $pack <= 24)
        {
            //print_r("Normal User");
        }
        else
        {
            //print_r("No result found");
        }
    @endphp
    <div class="card-body">
        <div class="table-responsive">
            {{--  <input type="submit" value="Send Multiple Mail" class="mb-1 btn btn-warning multi_btn">  --}}

            {{-- <div class="p-0 mb-2 text-right col-md-3">
                <button type="button" class="btn btn-primary send-mail btn-sm" disabled="disabled">
                    <i class="fa fa-envelope"></i>
                    Send Multiple Mail
                </button>
            </div>
            <div class="p-0 mb-2 text-right col-md-3">
                <button type="button" class="btn btn-success multi-doc-zip btn-sm">
                    <i class="fa fa-zip"></i>
                    Download Multiple Files
                </button>
            </div>
            <div class="p-0 col-md-12 success-mail" style="display: none;">
                <div class="alert alert-success">
                    Sent Mail Successfully.
                </div>
            </div> --}}

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        {{--  <th><input type="button" class="check" value="check all" /></th>  --}}
                        {{-- <th><input type="checkbox" value="1" name="user-all" class="user-all"></th> --}}
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Collection Date</th>
                        <th>Upload Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($data as $value)
                        <tr>
                            {{-- <td>
                                {{ Form::checkbox('ckeck_user', 1, false,['class'=>'ckeck_user','data-id' => $value->id ]) }}
                            </td> --}}
                            <td>{{ $i++ }}</td>
                            <td>{{ $value->patient_name }}</td>
                            <td>{{ Crypt::decryptString($value->patient_email) }}</td>
                            <td>{{ Crypt::decryptString($value->collection_date) }}</td>
                            <td>{{ $value->created_at }}</td>
                            @php
                                $Name = $value->patient_name;
                                $Fname = Crypt::decryptString($value->patient_email);
                                $Address = Crypt::decryptString($value->patient_gender);
                            @endphp
                            <td>
                                <a class="btn btn-primary" href="{{ url('print-urea-result')}}/{{ $value->id }}" title="View">
                                    <i class="fas fa-print"></i>
                                    Generate PDF
                                </a>
                                <button class="btn btn-success addCart" id="{{$value->id}}">
                                    <i class="fa fa-envelope"></i>
                                    Send Mail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
