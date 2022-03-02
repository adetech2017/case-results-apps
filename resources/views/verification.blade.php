<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="{{ asset('css/verify.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro" rel="stylesheet">

        <title>PCR - Verification</title>
    </head>
    <body>
        <div class=content>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <h1>Verified <i class="far fa-badge-check"></i></h1>
                    <p>National Health Laboratory Service</p>
                    <p>Name: {{$test_result->patient_name}}</p>
                    <p>Passport Number: {{Crypt::decryptString($test_result->passport_number)}}</p>
                    <p>DOB: {{Crypt::decryptString($test_result->patient_dob)}}</p>
                    <p>Sex: {{Crypt::decryptString($test_result->patient_sex)}}</p>
                    <p>Test Type: SARS COV 2 (COVID-19) RT-PCR</p>
                    <P>Result:  
                        @if (Crypt::decryptString($test_result->result) === 'p')
                            POSITIVE
                        @else
                            NEGATIVE
                        @endif
                    </P>
                    {{--  <p>Date: {{Carbon::createFromFormat('Y-m-d H:i:s', $test_result->created_at)->format('d/m/Y')}}</p>  --}}
                    <p>Lab Ref: {{Crypt::decryptString($test_result->lab_code)}}</p>                  
                    <p>Document Number: {{$test_result->document_number}}</p>
                    <p>Sample Collection Date: {{Crypt::decryptString($test_result->sample_collection_date)}}</p>
                </div>
                <div class="footer-like">
                    <a href="#">Biologix Lab</a>
                </div>
            </div>
        </div>
    </body>
</html>
