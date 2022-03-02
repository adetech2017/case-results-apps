<html>
    
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/covid19_template_stylesheet.css')}}" />  --}}
    <style>
        .text-center {
    text-align: center;
    }
    .nsimsun {
        font-family: NSimSun, 'Courier New', Courier, monospace;
    }
    .calibri {
        font-family: Calibri, 'Trebuchet MS', sans-serif;
    }
    .comic-sans{
        font-family: 'Comic Sans MS';
    }
    .red {
        color: #ff0000;
    }
    .dark-blue {
        color: #1f3864;
    }
    .bg-white{
        background-color: #ffffff;
    }
    .p-1{
        padding: 8px;
    }
    .p-2{
        padding: 16px;
    }
    .p-3{
        padding: 24px;
    }
    .p-4{
        padding: 32px;
    }
    .ph-2{
        padding-left: 10px;
        padding-right: 10px;
    }
    .pr-1{
        padding-right: 5px;
    }
    .pl-1{
        padding-left: 5px;
    }
    .pr-2{
        padding-right: 10px;
    }
    .pl-2{
        padding-left: 10px;
    }
    .pr-2{
        padding-right: 40px;
    }
    .pb-0 {
        padding-bottom: 0;
    }
    .pt-0 {
        padding-top: 0;
    }
    .pv-0 {
        padding-top: 0;
        padding-bottom: 0;
    }
    .pv-1 {
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .pv-2 {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .pv-3 {
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .pv-5 {
        padding-top: 25px;
        padding-bottom: 25px;
    }
    .pt-1 {
        padding-top: 5px;
    }
    .pt-2 {
        padding-top: 10px;
    }
    .pb-1 {
        padding-bottom: 5px;
    }
    .pb-2 {
        padding-bottom: 10px;
    }
    .pt-5 {
        padding-top: 25px;
    }
    .pb-5 {
        padding-bottom: 25px;
    }
    .mb-0 {
        margin-bottom: 0;
    }
    .mt-0 {
        margin-top: 0;
    }
    .mv-0 {
        margin-top: 0;
        margin-bottom: 0;
    }
    .mb-1 {
        margin-bottom: 5px;
    }
    .mt-1 {
        margin-top: 8px;
    }
    .mt-2 {
        margin-top: 16px;
    }
    .mt-3 {
        margin-top: 24px;
    }
    .mt-5{
        margin-top: 40px;
    }
    .mt-6{
        margin-top: 48px;
    }
    .mb-2 {
        margin-bottom: 16px;
    }
    .mb-3 {
        margin-bottom: 20px;
    }
    .h2{
        font-size: 21.28px;
        font-weight: bold;
    }
    .h3{
        font-size: 18.72px;
        font-weight: bold;
    }
    .h4{
        font-size: 16px;
        font-weight: bold;
    }
    .h5{
        font-size: 13.28px;
        font-weight: bold;
    }
    .h6{
        font-size: 10.72px;
        font-weight: bold;
    }
    .w-25{
        width: 25%;
    }
    .w-33{
        width: 33.3333%;
    }
    .w-15{
        padding-left: 5px;
        width: 15px;
    }
    .w-50{
        width: 50%;
    }
    .w-66{
        width: 66.6667%;
    }
    .w-75{
        width: 75%;
    }
    .w-100{
        width: 100%;
    }
    .position-abs{
        position: absolute;
    }
    .border-bottom-1 {
        border-bottom: 1px solid #000000;
    }
    .no-bold{
        font-weight: normal;
    }
    .italic{
        font-style: italic;
    }
    /**Concrete **/

    body {
        position: relative;
        background-color: #ffffff;
        margin: 32px 32px 0px 32px;
        font-family: Calibri, 'Trebuchet MS', sans-serif;
    }
    body>.container{
        width: 100%;
    }
    .lab-banner {
        display: inline;
    }

    .lab-banner .left-component,
    .lab-banner .middle-component,
    .lab-banner .right-component {
        display: inline-block;
    }

    .lab-banner .left-component {
        top: -10px;
        padding-right: 24px;
    }
    .header-text-row-1, .header-text-row-2{
        font-family: 'Times New Roman', Times, serif;
    }

    .lab-banner .right-component {
        right: 16px;
        top: 0px;
    }

    .doc-number{
        text-align: right;
        margin-top: -14px;
        margin-right: 48px;
    }
    .date .date-content{
        padding: 2px 24px;
    }
    .details-component-holder{
        background-color: #d9d9d9;
        padding-right: 0px;
        padding-bottom: 0px;
    }
    .dc-left{
        width: 65%;
    }
    .dc-right{
        width: 35%;
    }
    .location{
        align-content: right;
    }
    .table-l{
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }
    .table-c{
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }
    table.row-bordered{
        border-top: 1px solid #000000;
        border-left: 1px solid #000000;
        border-right: 1px solid #000000;
    }
    table.row-bordered td{
        border-bottom: 1px solid #000000;
    }
    table.col-bordered{
        border-top: 1px solid #000000;
        border-left: 1px solid #000000;
    }
    table.col-bordered td{
        border-right: 1px solid #000000;
        border-bottom: 1px solid #000000;
    }
    .end-result-table{
        background-color: #f2f2f2;
    }
    table.light-gray-border,
    table.light-gray-border td{
        border-color: #d2d2d2;
    }
    .test-result tbody tr:nth-child(odd){
        background-color: #efefef;
    }
    .general-comment-component{
        position: relative;
        border: 2px solid #000000;
        border-radius: 32px;
    }
    .general-comment-component .title{
        float: left;
        margin-top: -39px;
        margin-left: 32px;
        text-decoration: underline;
    }
    footer{
        margin-top: auto;
        border-top: 3px solid #000000;
    }
    .footer-content{
        background-color: #9dc3e6;
    }
    .td_size {    
        width:10px; 
        height:5px;
        max-width:10px;
        min-width:10px; 
        max-height:5px; 
        min-height:5px;
        padding: 5px
    }

    </style>
</head>

<body>
    <div class="container">
        
        <header>
            <div class="lab-banner">
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: right;">
                            <div class="left-component">
                                <div class="left-logo">
                                    @if ($mailData->patient_location === "Lagos")
                                        <img height="80px"
                                        src="data:image/jpeg;base64,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" />
                                    @endif                                   
                                </div>
                            </div>
                        </td>
                        <td style="text-align: center;">
                            <div class="middle-component">
                                <div class="mid-comp-holder">
                                    <div class="header-text-row-1">
                                        <p class="text-center mv-0 mb-3 h2">BIOLOGIX</p>
                                    </div>
                                    <div class="header-text-row-2">
                                        <p class="text-center red mv-0 mb-3 h6">
                                            A MEMBER OF THE LAGOS COVID-19 LABORATORY CONSORTIUM<br />
                                            LAGOS STATE<br />
                                        </p>
                                    </div>
                                    <div>
                                        <p class="text-center calibri dark-blue mv-0 h4">LABORATORY INVESTIGATION RESULT
                                            PAGE
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="text-align: left;">
                            <div class="right-component">
                                <div class="right-logo">
                                    <img height="50" src="data:image/png;base64,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" />
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td colspan="3">
                            <div class="doc-number">
                                <p class="nsimsun mv-0 h5">Document No: {{$mailData->document_number}}</p>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </header>
        <main>
            <div class="title-component mt-3">
                <div class="text-center">
                    <span class="pb-1 border-bottom-1 h5 title comic-sans">
                        VIROLOGICAL SCREENING TEST FOR COVID-19 OUTBREAK
                    </span>
                </div>
            </div>
            <div class="data-component mt-3">
                <div class="date-component">
                    <span class="date">
                        <span class="date-title h5"> Date: </span>
                        <span class="date-content h5 no-bold border-bottom-1"> {{$mailData->created_at}} </span>
                    </span>
                    <span class="location align-right">
                        <span class="date-title h5"> Test Location: </span>
                        <span class="date-content h5 no-bold"> {{$mailData->patient_location}} </span>
                    </span>
                </div>
                <div class="details-component">
                    <div class="details-component-holder p-2 mt-1">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <th class="dc-left" style="vertical-align: top;">
                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td class="w-66">
                                                        <table class="table-l">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="pt-0 pb-2">
                                                                        <span class="h5 pr-1">NAME:</span>
                                                                        <span
                                                                            class="h5 pr-1 no-bold">{{$mailData->patient_name}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pv-2">
                                                                        <span class="h5 pr-1">D.O.B:</span>
                                                                        <span class="mb-1 h5 no-bold">{{Crypt::decryptString($mailData->patient_dob)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pv-2">
                                                                        <span class="h5 pr-1">SEX:</span>
                                                                        <span class="mb-1 h5 no-bold">{{Crypt::decryptString($mailData->patient_sex)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class=" pv-2">
                                                                        <span class="h5 pr-1">ADDRESS:</span>
                                                                        <span
                                                                            class="h5 pr-1 no-bold">{{Crypt::decryptString($mailData->patient_address)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="pv-2">
                                                                        <span class="h5 pr-1">PHONE NO.:</span>
                                                                        <span
                                                                            class="h5 pr-1 no-bold">{{Crypt::decryptString($mailData->patient_phone)}}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                    <td style="vertical-align: text-top;">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="pb-2">
                                                                        <p class="mb-1 h5">SAMPLE <br />COLLECTED ON:</p>
                                                                        <span class="mb-1 h5 no-bold">{{Crypt::decryptString($mailData->sample_collection_date)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pb-2">
                                                                        <p class="mb-1 h5">TIME:</p>
                                                                        <span class="mb-1 h5 no-bold">{{Crypt::decryptString($mailData->sample_collection_time)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pb-2">
                                                                        <p class="mb-1 h5">PASSPORT NO.:</p>
                                                                        <span class="mb-1 h5 no-bold">{{Crypt::decryptString($mailData->passport_number)}}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table class="table-l">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="2" class="pv-2">
                                                                        <span class="h5 pr-1">EMAIL:</span>
                                                                        <span
                                                                            class="h5 pr-1 no-bold">{{Crypt::decryptString($mailData->patient_email)}}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" class="pt-2">
                                                                        <span class="h5 pr-1">NATIONALITY:</span>
                                                                        <span
                                                                            class="h5 pr-1 no-bold">{{Crypt::decryptString($mailData->patient_nationality)}}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </td>
                                    <th class="dc-right" style="vertical-align: top;">
                                        <table class="table-l">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="h5">SAMPLE(S): SCREENING/REPEAT/FOLLOW</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="">
                                                        <table class="table-l row-bordered">
                                                            <tbody>
                                                                <tr>
                                                                    <td>1.</td>
                                                                    <td colspan="2">NASOPHARYNGEAL</td>
                                                                    <td style="text-align: right;">{{Crypt::decryptString($mailData->nasopharyngeal)}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2.</td>
                                                                    <td colspan="2">OROPHARYNGEAL</td>
                                                                    <td style="text-align: right;">{{Crypt::decryptString($mailData->oropharyngeal)}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3.</td>
                                                                    <td colspan="2">SPUTUM</td>
                                                                    <td style="text-align: right;">{{Crypt::decryptString($mailData->sputum)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4.</td>
                                                                    <td colspan="2">BLOOD</td>
                                                                    <td style="text-align: right;">{{Crypt::decryptString($mailData->blood)}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5.</td>
                                                                    <td colspan="2">OTHERS</td>
                                                                    <td style="text-align: right;" class="h6 no-bold">
                                                                        {{Crypt::decryptString($mailData->other_samples)}} </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-5">
                                                        <span class="h5 pr-1">DATE OF RESULT:</span>
                                                        <span class="h5 pr-1 no-bold">{{Crypt::decryptString($mailData->result_date)}}</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pt-3">
                                                        <table class="table-l end-result-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="p-1"><span class="h4">POSITIVE</span>
                                                                    </td>
                                                                    <td><span class="h4"> # </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="p-1"><span class="h4">NEGATIVE</span>
                                                                    </td>
                                                                    <td><span class="h4"> # </span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="test-result-component mt-5">
                <span class="h5">RESULT:</span>
                <div class="test-result">
                    <table class="table-l col-bordered light-gray-border">
                        <thead>
                            <tr>
                                <td class="pl-1"><span class="h6 italic">S/N</span></td>
                                <td class="pl-1"><span class="h6 italic">TEST DONE</span></td>
                                <td class="pl-1"><span class="h6 italic">LAB CODE(SPECIMEN USED)</span></td>
                                <td class="pl-1"><span class="h6 italic">REFERENCE <br /> RANGE</span></td>
                                <td class="pl-1"><span class="h6 italic">TEST VALUE</span></td>
                                <td class="pl-1"><span class="h6 italic">COMMENT</span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pl-1 pv-1"><span class="h6">1</span></td>
                                <td class="pl-1 pv-1"><span class="h6">RT-PCR FOR SARS-COV2</span></td>
                                <td class="pl-1 pv-1"><span class="h6">{{Crypt::decryptString($mailData->lab_code)}}</span></td>
                                <td class="pl-1 pv-1"><span class="h6">RESULT_SIGN CUT OFF</span></td>
                                <td class="pl-1 pv-1"><span class="h6">{{Crypt::decryptString($mailData->result)}}</span></td>
                                <td class="pl-1 pv-1"><span class="h6">RESULT_COMMENT</span></td>
                            </tr>
                            <tr>
                                <td class="pl-1 pv-2"></td>
                                <td class="pl-1 pv-2"></td>
                                <td class="pl-1 pv-2"></td>
                                <td class="pl-1 pv-2"></td>
                                <td class="pl-1 pv-2"></td>
                                <td class="pl-1 pv-2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="general-comment-component p-3 pt-5 pb-5 mt-5">
                <span class="p-2 pt-1 pb-1 h6 bg-white title">General Comment</span>
                <div class="pb-3 pt-2">
                    <span class="pr-2 h5"> (RESULT_COMMENT) FOR SARS COV 2 (COVID-19) AS AT:</span>
                    <span class="pl-2 pr-2 h5 no-bold border-bottom-1">{{Crypt::decryptString($mailData->result_date)}}</span>
                </div>
            </div>
            <div class="signatures-component pb-1">
                <table class="table-l">
                    <tbody>
                        <tr>
                            <td class="w-33">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pl-1" style="vertical-align: top;">
                                                <span class="h6">Signature:</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-1" style="vertical-align: bottom;">
                                                <img height="50px" src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDABQODxIPDRQSERIXFhQYHzMhHxwcHz8tLyUzSkFOTUlBSEZSXHZkUldvWEZIZoxob3p9hIWET2ORm4+AmnaBhH//2wBDARYXFx8bHzwhITx/VEhUf39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f39/f3//wAARCABgAQADASIAAhEBAxEB/8QAGgABAAIDAQAAAAAAAAAAAAAAAAQFAQMGAv/EADcQAAEEAQIDBQUHBAMBAAAAAAEAAgMEEQUhEjFBBhNRcZEUImGB8CQyQqGxwdEVI0NSM1Pxsv/EABgBAQEBAQEAAAAAAAAAAAAAAAABAgME/8QAIhEBAQACAgIBBQEAAAAAAAAAAAECERIhAzFBEyIyUWHR/9oADAMBAAIRAxEAPwDskREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBETKAiZTKAsPe1jS5xAA6lZVZ2iBdotnHQA+hCuM3lJ+xZoo2nS99p9eXOeOJp/JSVPV0CIiAiJlAREQETKICIiAiIgIiICIiAiIgIiICIiAiLHVBh8jImF0jg1o3JccAKom1l72yPqxgQs5zS5A+Q6+S8TvdqmqmqxxFWDeUt2y7wz9clrhhbq9wtDOHTqrsNYBs9319brvjhjO8mbXivJrVv34ZQ2I8nPaAD5DGVuktavTIE/cPZ/2Bpx81dtaAAAAAOWFhzA8Frmgg8wRzWfqy38Zo1f2gsvzMYHz1y6M8nxHiHn5LTrFmOxo0xgeH8RDduecjZHh2k2Gubk0pDgtO/dn+FE16u1r6z6jAJZZQXBvJ4G+/8reEnOWG7pO7OzCXSYh1jJYfkf4wrRUHZiXJvxjYNm4wD0z/AOK/BXPyzWdWehERc1FD1O8KNfvOEOeTwtaXYyf/AAFTFV62GuFZrt8y5A8dj/K1hJcpKl9J9aZtiCOVvJ7Q7HgtqrdFd9kfGf8AFK9n55/dWGd1Mpq2EQ9SnfA+oWuw187WO+IOVOVXeeLGqU6o3EZMz/hj7v5q0BVy6kBEyiyoiZWC4AZJwPigyihP1Wo2Tu2Sd9J0ZEOI/kpUL3SRhzmOYT+F2MhWyz2PaIigIiICIiAiIgLVZk7mvLIBksaXY8gtq1zx97DJH/u0t9Qg5qtP7B2YktcWZrLzv1JJI/QFWlOO1Vq1oY4GuG3eucd8ncn9Vz+nA259P05wIbXke+Rp+BJH8fNdoF6fP9t1/d/4zO3lnGM8eD4YXparVhlWB0r+Q6eJUH2e3ebxWJDCwjaJmxPmVwmO5u+ltS7MtZzHRTSxhrhghzgFz1Kdp1uKq+xG+Oq1xjdxDfPLfrzHopcDqdenPLPBFxwnw3dkZGM+nyUL2BsEFa/NG3vJZuJ4I5NJ5ei9GGMkuNZtStNIq9p79f8ABOwSt+Pl6n0V+2VjnuY17S9v3mg7hcXrxdpGtQzUzh5iOzjnGchetNL67azq8n2m2DHNxHLmkuzxeWFcvFzkz2srrZrteA4fKOL/AFbufQLWNSrH8bh5scP2XqvVgpxbY2G73c1FsaiyauBRkZJI9/dtOMhp8cLzzGX0u072mEs4+9ZweORhUnaG7A4UjFYicW2BnheDgYOVmbRq9MtuPBsFv/L3nUeI8FE7SM09ulNkrsg4uNvCWge9zXbx4Yc5Zupb0tdElY6Gw7vGnjne4DI5KRb1OrWbIDNG6Vgz3YcC7PTZUV6lR0/SIIzCx1iVvCHAkE53J281I0XQWxFlmw3cDDGO5jPUpcMO87ejd9Pel2e6bJamr2JJZzxOkbHloHQDqrNuq03ROe2dp4ebeTvTms0A5kHcvGHRHh+XRVlitHqeuSsOWCtGMPaMHiPXPwWbxyyuzuLFl+Q+8+pKyPxPPHjhS2SsfGHtcHMO+RyVY23PQe2O/h8JOG2Gj/6HRV7opJdWn0yKb7NJid5adw3bLf09Qs/Tl/i7WUuqPmkMWnQ9+8c5Dsxvz6ryNJktHi1Gy6br3TPdYP5VjDDHXibFE0NY0bALYFnnr8TTXBXhrs4IY2xt8GjC2hEWPftRERAREQEREBERAREQcrf4dI7URWyP7FlpDvgTgH9j811AIKrO0Gn+30DwDMsXvN25+IVJoztQp1g6lw26+ffruPC6I/D6+S73H6mEu+50zvVdHqlM3qTomP4HghzXfEclAdrjqsEg1CB0E7W+71a8/BaZu05r4E1GaN55NJ3J/dRI+HVJW2dXuwxxNPEyq13Lz+vRax8dk++dFv6V8glf3OoyNidGxwzAX+84eJH15K613Uak+mQuZM1wkcHbEZAweY+t15tX6Uv2bTqPtbyMYYOFgCpbHZ63VaJJohJxg7R78J+K7zjnZb1pn02vkrX4b1+zO32ibLYIhkloB22Hjy9fFaKuoyx+y2oqznyUwWyk7NIOw8ua7HTdMr1KcLO4j7wMHE7hGSeu/muet6VJBrckVd/d9+0ujzsHeLT9eCmHkwy3j8FnytI6tnV42vtWoxVO4irHZ3mVHv1WaXqdKeFobXdI1rmjkDyz6H8lE0+eOtHl0NuGSM9290ADmk/EKReP9SqurxNvz55ZYA0HpnO6zxuOWvhVhrmo14aU9fj45pGOYGM3IyOvgqT+l27OkCSWNvC2EGMcX3Wjfl448VaU9Elkaz2zgjjaBmGP8RHVx6q9LRggjblhcuc8Ukw7NbcTpkjoNR0+W64uY8EMe/cDp+Rwu1GypKdBk1axpVuFzmRvLmOxsAeRB8dytYqa3pjSypNHagb9xso95o8Poq+WzyZdXWlnSfddJHqFcQuAdMC0gjbZVccl+rrk0fDWbJaaHAuJ4MgevisVrVxt0Wb9O3JK0EMbHFhjVJumzqcbAzT5opGEOZK53CWn9VZjx6s60iVLTv22Ojs2omRvGHNjj5jzKrey8bK927FsXO96NxIJLAcc/RTIrerVWBlmj7Rj/JE7c+YUCjWu1p3S1aMnGQWMM7sBg8uqSXjlLT5X2oSSww+0RPaO6OXtccBzevkfBSYZGzQskYcte0OB+BVQNJt3XB2p2uKPOe5i2arljQxoa0ANAwAOi4ZSSSS9tMoiLCiIiAiIgIiICIiAiIgxjdc7qVRsupNbp7JorJJL5We6xu2d/NdGmFrDPhdxLNuZj7PX22BYfcjklxgue3iI+G4UxnZ2B8ne3JHWHeB91qusIt3z535OMa4YIq7AyGNkbR0aML3hZRct32oq/WKBu1v7ZxPEeKN3LBVghCuOVxu4VSdn3TSOuOmjLOKQEtxjBxgq6AQBZVzy5ZW6STQERFlWMIsogYREQMLGFlEBERAREQEREBERB//Z" /> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pl-1">
                                                <span class="h6 pr-1">Name:</span>
                                                <span class="h6 pr-1 no-bold">DR. EMUEJEVOKE TOYE</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pl-1">
                                                <span class="h6 pr-1">Designation:</span>
                                                <span class="h6 pr-1 no-bold">Managing Director</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td class="w-33">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pl-1" style="vertical-align: top;">
                                                <span class="h6">Signature:</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pl-1" style="vertical-align: bottom;">
                                                <img height="50px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGwAAABPCAMAAAA5gNBnAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAGUExURQAAAAAAAKVnuc8AAAACdFJOU/8A5bcwSgAAAAlwSFlzAAAXEQAAFxEByibzPwAAAqtJREFUaEPtUtly5EAMyvz/T68OpIZO+8iMxw9bpmrdCJBItvLzuhHny35+Pv7BnrLby0Dex+kLF/xiT9lTto+n7NYy63rKtnHygnc9Zds4d8GbbizLfx/i1IX4L7y57OO2k2XxuaUsa24ry+8dZWj5L8rs7rjc9AtlUZRooUi+70MPZMlAamFdXdYN+QTF13FpWVYo44qhvQs+Vcec1NDilWV2iWh8aQhcVkZdXTa+CeYrHNiGDNidToLmwwXMVziwDRlY3YxHDhxcO7ANEVj+/P7qL3Nw7cA2eMBOjlxTF79TloNhcGNsGK4ok5ODf79s4ro+z4p9N2ABDm2VBbugTELKxxTs4jJZUCM+e+dOloEaJP9r+/MyyeyXqT3jr2WaPy7zZd4G2cQUp7w4iUnwhGyDGMU7YStepwyYDfPgwGQoPmR2HZwnipUEFA2IEcjZ9bLqLfBf4/Ai75gWJEt6IATXyxos4MMQmnkokENoAfBhMkxJYyMVQ0vtuGJD6hlpI78kCFWMxUQtByfHpZTdTZYq5xNEFbVQkC0ycCI+ZLVSsgJempnHYiB5mIEYKxTfkMsIksICaWUSkLF5pHfQqTlautP4CGQmHvk1xg4EA/ik+pzfBPOpDM8MFyNC7pjyKQ41iIGoDXgNEgGpExBicsTkwAyQOCiYgekq4XsLwDVASEBbn7IBr2GZMMooAa4hZzjQiLOoZU1kywb/0vrw5wFsUNJswGtoWZec84pLlBzGtDcRh2RnElkfdKUmJ6RzrJkkmC58cN5wrQGp0Mpv4mDafr4OZFlyDYBAKLU9STFNrnZwvesHHRgV8MptEiAOYzqcX9VknODuCAzmIJ6G2olJWkUIZrevUeHmHBwKnMkAu2Xn7pwum87pcK7rPPbKroee/3IZ4/X6BwmTG8xIP0nRAAAAAElFTkSuQmCC" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pl-1">
                                                <span class="h6 pr-1">Name:</span>
                                                <span class="h6 pr-1 no-bold">GIFT ERUSE</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="pl-1">
                                                <span class="h6 pr-1">Designation:</span>
                                                <span class="h6 pr-1 no-bold">Laboratory Manager</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            @php
                                $code = Crypt::decryptString($mailData->lab_code);
                                $passport = Crypt::decryptString($mailData->passport_number);
                                $doc_num = $mailData->document_number;
                            @endphp
                            <td>
                                {!! DNS2D::getBarcodeHTML(('Lab Code: '. $code .', '. 'Passport Num: '.$passport.', '. 'Document No.: '.$doc_num), 'QRCODE', 5,5) !!}                    
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
        <footer>
            <div class="footer-content pv-3 text-center">
                <p class="h6 mt-0 mb-0">
                    <span class="pr-1">Address:</span>
                    <span class="h6">56C Olorunlogbon street, Anthony Village, Lagos, Nigeria</span>
                </p>
                <p class="mv-0 pt-1">
                    <span class="pr-1">
                        <span class="pr-1 h6">Phone:</span>
                        <span class="h6"><a href="tel:08053072221">0805 3072 221</a></span>,
                        <span class="h6"><a href="tel:08069583073">0806 9583 073</a></span>
                    </span>
                    <span class="pr-1">
                        <span class="pr-1 h6">Email:</span>
                        <span class="h6"><a
                                href="mailto:info@biologix.com.ng">info@biologix.com.ng</a></span>
                    </span>
                    <span class="pr-1">
                        <span class="pr-1 h6">Website:</span>
                        <span class="h6"><a href="https://biologix.com.ng">biologix.com.ng</a></span>
                    </span>
                </p>
            </div>
        </footer>
    </div>
</body>

</html>
