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

        <title>Antigen Result - Verification</title>
    </head>
    <body>
        <div class=content>
            <div class="left-logo">
                <img height="50" src="data:image/png;base64,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" />
            </div>
            <div class="wrapper-1">
                <div class="wrapper-2">
                    <h3>Thank you for choosing Biologix, here is your details.</h3>
                    <p>Biologix Support Services</p>
                    <p>
                        The test is a valid test from Biologix
                        Verified and Valid
                    </p>
                    <h1>Verified <i class="far fa-badge-check"></i></h1>
                    <p>Biologix Laboratory Services</p>
                    <p>Name: {{$test_result->patient_name}}</p>
                    <p>Passport Number: {{Crypt::decryptString($test_result->passport_number)}}</p>
                    <p>DOB: {{Crypt::decryptString($test_result->patient_dob)}}</p>
                    <p>Sex: {{Crypt::decryptString($test_result->patient_sex)}}</p>
                    <p>Test Type: SARS COV 2 (COVID-19) Antigen</p>
                    <P>Result:
                        @if (Crypt::decryptString($test_result->final_result) === 'P' || Crypt::decryptString($test_result->final_result) === 'p')
                            POSITIVE
                        @else
                            NEGATIVE
                        @endif
                    </P>
                    <p>Lab Ref: {{Crypt::decryptString($test_result->lab_code)}}</p>
                    <p>Document Number: {{$test_result->document_number}}</p>
                    <p>Sample Collection Date: {{Crypt::decryptString($test_result->collection_date)}}</p>
                </div>
                <div class="footer-like">
                    <a href="#">Biologix Lab</a>
                </div>
            </div>
        </div>
    </body>
</html>