<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biologix Test Result App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.css"></script>
</head>
<body>
    <div class="container mt-5 text-center">
        <h2 class="mb-4">
            Biologix Test Result App
        </h2>
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session()->get('status') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session()->get('error') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissable">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-4">
                <label>Select Test Result</label>
                <select class="form-control" name="test_result_id">
                    <option value="0">Select Test Result</option>
                    @foreach ($data as $result)
                        <option value="{{$result->id}}">{{ $result->test_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <div class="custom-file text-left">
                    <input type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="col-md-5">
                <label>Prc Sample: </label>
                <a href="{{url('download-prc-sample')}}">Download sample Covid-19 Prc Test</a>
            </div>
            <div class="col-md-5">
                <label>Antigen Sample: </label>
                <a href="{{URL::to('sample/covid19_antigen_test_result_data_sample.csv')}}">Download sample Antigen Test</a>
            </div>

            <button class="btn btn-primary">Import data</button>
            <a class="btn btn-success" href="{{ url('show-prc-test-results') }}">Test Result</a>
        </form>
    </div>

    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $("#bulk_add").hide()
            $("#choose_payment").change(function() {
                $(this).val() == 'Bulk payment' ? $("#bulk_add").show() : $("#bulk_add").hide();
            });
        });
    </script>
</body>
</html>
