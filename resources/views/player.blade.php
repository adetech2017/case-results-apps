<!DOCTYPE html>

<html>


<body>
    <h1 class="h3 mb-4 text-gray-800">Upload New Test Results</h1>

<div class="row">

    <div class="col-lg-8">

        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Batch Results Upload</h6>
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
            <form action="{{ route('upload-players-detail') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Upload File</label>
                        <input type="file" name="uploaded_file" class="form-control">
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Upload Result</button>
                </div>
            </form>
        </div>

        <div id="prc_result">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sample data</h6>
                </div>
                <div class="card-body">
                    <a href="{{ url('prc-file-download')}}">Download PCR sample data</a>
                </div>
            </div>
        </div>
        <div id="antigen_result">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sample data</h6>
                </div>
                <div class="card-body">
                    <a href="{{ url('antigen-file-download')}}">Download Antigen sample</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
