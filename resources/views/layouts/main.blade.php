<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Biologix Lab - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    @php
        $patients = \App\Models\TestResult::select(DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
    @endphp
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-dna"></i>
                </div>
                <div class="mx-3 sidebar-brand-text">Biologix <sup>Lab</sup></div>
            </a>

            <!-- Divider -->
            <hr class="my-0 sidebar-divider">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Cases</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Case Result:</h6>
                        <a class="collapse-item" href="{{ url('upload-new-case')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('antigen/show-all-results')}}">Antigen Test Results</a>
                        <a class="collapse-item" href="{{ url('show-prc-test-results')}}">PCR Test Results</a>
                        <a class="collapse-item" href="{{ url('admin/mail-delivery-status')}}">Mail Status</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Hep-B Test</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Hep-B Result:</h6>
                        <a class="collapse-item" href="{{ url('hep-b/create-new-hep-test')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('hep-b/all-hep-results')}}">Hep-B Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>HIV Screening</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">HIV Result:</h6>
                        <a class="collapse-item" href="{{ url('hiv/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('hiv/hiv-results')}}">HIV Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                    aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>PT Screening</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">HIV Result:</h6>
                        <a class="collapse-item" href="{{ url('pregenacy/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('pregenacy/pt-results')}}">PT Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                    aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Urea Screening</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Urea Result:</h6>
                        <a class="collapse-item" href="{{ url('urea/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('urea/urea-results')}}">Urea Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix"
                    aria-expanded="true" aria-controls="collapseSix">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>PSA Screening</span>
                </a>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">PSA Result:</h6>
                        <a class="collapse-item" href="{{ url('psa/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('psa/psa-results')}}">PSA Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven"
                    aria-expanded="true" aria-controls="collapseSeven">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Creatine Screening</span>
                </a>
                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Creatine Result:</h6>
                        <a class="collapse-item" href="{{ url('creatinine/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('creatinine/creatinine-results')}}">Creatine Test Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="true" aria-controls="collapseEight">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Blood Sugar Screening</span>
                </a>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Blood Sugar Result:</h6>
                        <a class="collapse-item" href="{{ url('blood-sugar/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('blood-sugar/blood-sugar-results')}}">Blood Sugar Results</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEight"
                    aria-expanded="true" aria-controls="collapseEight">
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Blood Group Screening</span>
                </a>
                <div id="collapseEight" class="collapse" aria-labelledby="headingEight">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Blood Group Result:</h6>
                        <a class="collapse-item" href="{{ url('blood-group/create-new')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('blood-group/blood-group-results')}}">Blood Group Results</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Users Managemnet:</h6>
                        <a class="collapse-item" href="{{ url('admin/create-new-user')}}">Add New</a>
                        <a class="collapse-item" href="{{ url('admin/show-all-users')}}">All Users</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-history"></i>
                    <span>Logs History</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="py-2 bg-white rounded collapse-inner">
                        <h6 class="collapse-header">Log Histrory:</h6>
                        <a class="collapse-item" href="{{ url('/admin/log-history')}}">All Logs</a>
                        <a class="collapse-item" href="{{ url('/admin/all-mail-logs')}}">Mail Logs</a>
                        <a class="collapse-item" href="{{ url('/admin/archive-results')}}">Multiple Download</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span>
                </a>
            </li> --}}

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span>
                </a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="border-0 rounded-circle" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="mb-4 bg-white shadow navbar navbar-expand navbar-light topbar static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="mr-3 btn btn-link d-md-none rounded-circle">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="my-2 mr-auto d-none d-sm-inline-block form-inline ml-md-3 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="border-0 form-control bg-light small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="ml-auto navbar-nav">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="p-3 shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="mr-auto form-inline w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="border-0 form-control bg-light small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 text-gray-600 d-none d-lg-inline small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="shadow dropdown-menu dropdown-menu-right animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('profile/change-password')}}">
                                    <i class="mr-2 text-gray-400 fas fa-user fa-sm fa-fw"></i>
                                    Profile
                                </a>
                                {{--  <a class="dropdown-item" href="#">
                                    <i class="mr-2 text-gray-400 fas fa-cogs fa-sm fa-fw"></i>
                                    Settings
                                </a>  --}}
                                <a class="dropdown-item" href="{{ url('profile/activity-logs')}}">
                                    <i class="mr-2 text-gray-400 fas fa-list fa-sm fa-fw"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            class="dropdown-item"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <i class="mr-2 text-gray-400 fas fa-sign-out-alt fa-sm fa-fw"></i>
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="my-auto text-center copyright">
                        <span>Copyright &copy; Biologix-App 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="rounded scroll-to-top" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>


    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#prc_result").hide()
            $("#antigen_result").hide()
            $("#test_result").change(function() {
                $(this).val() == '2' ? $("#prc_result").show() : $("#prc_result").hide();
                $(this).val() == '1' ? $("#antigen_result").show() : $("#antigen_result").hide();
            });
        });
    </script>

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
                        if (data.status === 200)
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
                        if(data.status === 500)
                        {
                            Swal.fire('Oops!', data.message, 'error')
                        }
                        if(data.status === 422)
                        {
                            Swal.fire('Oops!', 'Mail already sent', 'error')
                        }
                    }
                });
            });
        });


        //send antigen mail
        $(".antigenMail").click(function(e) {
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
                    url: "{{url('send-antigen-mail-result')}}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: patient_id,
                    },
                    dataType: 'json',
                    async: true,
                    success: function (data) {
                        console.log(data);
                        if (data.status === 200)
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
                        if(data.status === 500)
                        {
                            Swal.fire('Oops!', data.message, 'error')
                        }
                        if(data.status === 422)
                        {
                            Swal.fire('Oops!', 'Mail already sent', 'error')
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


        $('.check:button').click(function(){
            var checked = !$(this).data('checked');
            $('input:checkbox').prop('checked', checked);
            $(this).val(checked ? 'uncheck all' : 'check all' )
            $(this).data('checked', checked);
        });


        //send hep-b mail
        $(".hepMail").click(function(e) {
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
                    url: "{{url('send-hep-b-mail')}}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: patient_id,
                    },
                    dataType: 'json',
                    async: true,
                    success: function (data) {
                        console.log(data);
                        if (data.status === 200)
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
                        if(data.status === 500)
                        {
                            Swal.fire('Oops!', data.message, 'error')
                        }
                        if(data.status === 422)
                        {
                            Swal.fire('Oops!', 'Mail already sent', 'error')
                        }
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function()
        {
            $('.multi_btn').on('click', function(e)
            {
                e.preventDefault();

                const patient_id = [];

                $('.patient_id').each(function()
                {
                    if($(this).is(":checked"))
                    {
                        patient_id.push($(this).val());
                    }
                });

                console.log(patient_id);

                $.ajax({
                    url: "{{url('send-multiple-email')}}",
                    type: "POST",
                    data: {
                        _token: '{{csrf_token()}}',
                        id: patient_id,
                    },
                    success: function (data) {
                        console.log(data);
                        if (data.status === 200)
                        {
                            Swal.fire("Send!", data.message, "success");
                        }
                        else
                        {
                            Swal.fire("Error!", data.message, "error");
                        }
                    },
                });
            });
        });
    </script>

    {{-- send mail to pcr patients --}}
    <script>
        $('.user-all').change(function (e)
        {
            var value = $('.user-all:checked').val();
            if (value == 1)
            {
                $('input[name="ckeck_user"]').prop('checked',true);
                $('.send-mail').removeAttr('disabled');
            }
            else
            {
                $('input[name="ckeck_user"]').prop('checked',false);
                $('.send-mail').attr('disabled','disabled');
            }
        });

        $("input[name='ckeck_user']").change(function ()
        {
            if ($("input[name='ckeck_user']:checked").length > 0)
            {
                $('.send-mail').removeAttr('disabled');
            }
            else
            {
                $('.send-mail').attr('disabled','disabled');
            }
        });

        $('.send-mail').click(function (e)
        {
            e.preventDefault();
            var ids = [];
            $.each($('input[name="ckeck_user"]:checked'),function()
            {
                ids.push($(this).data('id'));
            });

            if (ids != '')
            {
                $(this).attr("disabled", true);
                $(this).html('<i class="fa fa-spinner fa-spin"></i> Sending Mail');
                $.ajax({
                    url: "{{url('patient-send-multi-mail')}}",
                    type: "POST",
                    data:
                    {
                        _token: '{{csrf_token()}}',
                        ids:ids
                    },
                    success: function (data)
                    {
                        $('.success-mail').css('display','block');
                        $('.send-mail').attr("disabled", false);
                        $('.send-mail').html('<i class="fa fa-share"></i> Sending Mail');
                    }
                });
            }
        });

        $('.multi-doc-zip').click(function (e)
        {
            e.preventDefault();
            var ids = [];
            $.each($('input[name="ckeck_user"]:checked'),function()
            {
                ids.push($(this).data('id'));
            });

            if (ids != '')
            {
                console.log('Zip file:', ids);

                $.ajax({
                    url: "{{url('admin/show-zipper-files')}}",
                    type: "GET",
                    data:
                    {
                        _token: '{{csrf_token()}}',
                        ids:ids
                    },
                    success: function (data)
                    {
                        console.log('Zip download:', data);
                        window.location = data;

                    }
                });
            }
        });
    </script>

    {{-- send antigen mail --}}
    <script>
        $('.antigen-all').change(function (e)
        {
            var value = $('.antigen-all:checked').val();
            if (value == 1)
            {
                $('input[name="ckeck_antigen"]').prop('checked',true);
                $('.send-antigen-mail').removeAttr('disabled');
            }
            else
            {
                $('input[name="ckeck_antigen"]').prop('checked',false);
                $('.send-antigen-mail').attr('disabled','disabled');
            }
        });

        $("input[name='ckeck_antigen']").change(function ()
        {
            if ($("input[name='ckeck_antigen']:checked").length > 0)
            {
                $('.send-antigen-mail').removeAttr('disabled');
            }
            else
            {
                $('.send-antigen-mail').attr('disabled','disabled');
            }
        });

        $('.send-antigen-mail').click(function (e)
        {
            e.preventDefault();
            var ids = [];
            $.each($('input[name="ckeck_antigen"]:checked'),function()
            {
                ids.push($(this).data('id'));
            });

            if (ids != '')
            {
                $(this).attr("disabled", true);
                $(this).html('<i class="fa fa-spinner fa-spin"></i> Sending Mail');
                $.ajax({
                    url: "{{url('send-antigen-multiple')}}",
                    type: "POST",
                    data:
                    {
                        _token: '{{csrf_token()}}',
                        ids:ids
                    },
                    success: function (data)
                    {
                        $('.success-mail').css('display','block');
                        $('.send-antigen-mail').attr("disabled", false);
                        $('.send-antigen-mail').html('<i class="fa fa-share"></i> Sending Mail');
                    }
                });
            }
        });
    </script>

    {{-- multiple-file-download --}}

    {{-- send multiple hep-b mail --}}
    <script>
        $('.hep-b-all').change(function (e)
        {
            var value = $('.hep-b-all:checked').val();
            if (value == 1)
            {
                $('input[name="ckeck_hep_b"]').prop('checked',true);
                $('.send-hep-b-mail').removeAttr('disabled');
            }
            else
            {
                $('input[name="ckeck_hep_b"]').prop('checked',false);
                $('.send-hep-b-mail').attr('disabled','disabled');
            }
        });

        $("input[name='ckeck_hep_b']").change(function ()
        {
            if ($("input[name='ckeck_hep_b']:checked").length > 0)
            {
                $('.send-hep-b-mail').removeAttr('disabled');
            }
            else
            {
                $('.send-hep-b-mail').attr('disabled','disabled');
            }
        });

        $('.send-hep-b-mail').click(function (e)
        {
            e.preventDefault();
            var ids = [];
            $.each($('input[name="ckeck_hep_b"]:checked'),function()
            {
                ids.push($(this).data('id'));
            });

            if (ids != '')
            {
                $(this).attr("disabled", true);
                $(this).html('<i class="fa fa-spinner fa-spin"></i> Sending Mail');
                $.ajax({
                    url: "{{url('send-multi-hep-mail')}}",
                    type: "POST",
                    data:
                    {
                        _token: '{{csrf_token()}}',
                        ids:ids
                    },
                    success: function (data)
                    {
                        $('.success-mail').css('display','block');
                        $('.send-hep-b-mail').attr("disabled", false);
                        $('.send-hep-b-mail').html('<i class="fa fa-share"></i> Sending Mail');
                    }
                });
            }
        });
    </script>





    <script type="text/javascript">

        var patients = <?php echo json_encode($patients) ?>;
        console.log(patients);
        // Area Chart Example
        var ctx = document.getElementById("patientsChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Patients PCR Results",
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: patients,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>



</body>

</html>
