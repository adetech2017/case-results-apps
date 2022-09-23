@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="mb-4 text-gray-800 h3">Upload New PSA Test Results</h1>

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="m-0 font-weight-bold text-primary">PSA Results Upload</h6>
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
            <form action="{{ route('import.psa.test') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Upload PT File</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Upload Result</button>
                </div>
            </form>
        </div>

        <div class="mb-4 shadow card">
            <div class="py-3 card-header">
                <h6 class="m-0 font-weight-bold text-primary">Sample data</h6>
            </div>
            <div class="card-body">
                <a href="{{ url('download-psa-sample')}}">Download PSA sample</a>
            </div>
        </div>
    </div>
</div>
@endsection
