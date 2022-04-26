@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Upload New Hep-B Test Results</h1>

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">HepBTest Results Upload</h6>
            </div>

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
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('import.hep.test') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Upload HepBTest File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Upload Result</button>
                </div>
            </form>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sample data</h6>
            </div>
            <div class="card-body">
                <a href="{{ url('download-hep-b-sample')}}">Download Hep-B sample</a>
            </div>
        </div>
    </div>
</div>
@endsection
