<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel & CSV to Database in Laravel 7</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
#ajaxSpinnerContainer {height:11px;}
#ajaxSpinnerImage {display:none;}
</style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-right">
            <a href="#" class="btn btn-info pull-right">All Result</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Result Listing') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Sex</th>
                                    <th width="150" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($data as $value)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $value->patient_name }}</td>
                                        <td>{{ Crypt::decryptString($value->patient_email) }}</td>
                                        <td>{{ Crypt::decryptString($value->patient_sex) }}</td>
                                        @php
                                            $Name = $value->patient_name;
                                            $Fname = Crypt::decryptString($value->patient_email);
                                            $Address = Crypt::decryptString($value->patient_sex);
                                            /* Add here all the data you need*/

                                            //$code = Crypt::decryptString($value->patient_phone).Crypt::decryptString($value->patient_sex);
                                        @endphp
                                        {{--  <td>{!! DNS2D::getBarcodeHTML(($Name.' '.$Fname.' '.$Address), 'QRCODE') !!}</td>  --}}
                                        <td class="text-center">
                                            <a class="btn btn-primary" href="{{ url('print-test-result')}}/{{ $value->id }}" title="View">
                                                <i class="fas fa-print"></i>
                                                Generate PDF
                                            </a>
                                        </td>
                                        {{-- <td class="text-center">
                                            <a class="btn btn-sm btn-info" href="{{ url('send-result-mail')}}/{{ $value->id }}" title="View">
                                                <i class="fas fa-print"></i>
                                                Send Mail
                                            </a>
                                        </td> --}}
                                        {{-- <td class="text-center">
                                            <button class="btn btn-primary pdfResult" id="{{$value->id}}">Generate PDF</button>
                                        </td> --}}
                                        <td class="text-nowrap ">
                                            <button class="btn btn-success addCart" id="{{$value->id}}">
                                                <i class="fa fa-file"></i>
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
            <div id="ajaxSpinnerContainer">
                <img src="{{ asset('images/loader.gif')}}" id="ajaxSpinnerImage" title="sending...">
            </div>
        </div>
    </div>
</div>

<!-- Script -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $(".addCart").click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'You are requesting to send mail.',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Send',
            denyButtonText: 'Dont send',
        }).then((result) => {
            var patient_id = $(this).attr("id");

            console.log("Patient ID:", patient_id);

            $.ajax({
                url: "{{url('send-patient-mail')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    id: patient_id,
                },
                dataType: 'json',
                async: true,
                success: function (data) {
                    console.log(data);
                    if (data.status === '1')
                    {
                        Swal.fire("Send!", data.message, "success");
                    }
                    else
                    {
                        Swal.fire("Error!", data.message, "error");
                    }
                },
                error: function(data)
                {
                    console.log(data);
                    if(data === 422)
                    {
                        Swal.fire('Oops!', data.message, 'error')
                    }
                    if(data.status === 422)
                    {
                        Swal.fire('Oops!', 'Reference number already sent', 'error')
                    }
                }
            });
        });
    });


    $(".pdfResult").click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to print test result.',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Print',
            denyButtonText: 'Dont print',
        }).then((result) => {
            var id = $(this).attr("id");

            console.log("Patient ID:", patient_id);

            $.ajax({
                url: "{{url('print-test-result')}}"+'/'+id,
                type: "GET",
                data: {
                    _token: '{{csrf_token()}}',
                    id: id,
                },
                dataType: 'json',
                async: true,
                success: function (data) {
                    console.log(data);
                    if(data.status === 200)
                    {
                        Swal.fire('Send!', data.message, 'success')
                    }
                    if(data.status === 404)
                    {
                        Swal.fire('Oops!', data.message, 'error')
                    }
                    //console.log('success');
                },
                error: function(data)
                {
                    console.log(data);
                    if(data === 422)
                    {
                        Swal.fire('Oops!', data.message, 'error')
                    }
                    if(data.status === 422)
                    {
                        Swal.fire('Oops!', 'Reference number already sent', 'error')
                    }
                }
            });
        });
    });
</script>
</body>
</html>
