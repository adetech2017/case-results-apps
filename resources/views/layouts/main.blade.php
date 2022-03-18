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
                <div class="sidebar-brand-text mx-3">Biologix <sup>Lab</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

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
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Case Result:</h6>
                        <a class="collapse-item" href="{{ url('upload-new-case')}}">Upload Result</a>
                        <a class="collapse-item" href="{{ url('antigen/show-all-results')}}">Antigen Test Results</a>
                        <a class="collapse-item" href="{{ url('show-prc-test-results')}}">PCR Test Results</a>
                        <a class="collapse-item" href="{{ url('admin/mail-delivery-status')}}">Mail Status</a>
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
                    <div class="bg-white py-2 collapse-inner rounded">
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
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Log Histrory:</h6>
                        <a class="collapse-item" href="{{ url('/admin/log-history')}}">All Logs</a>
                        <a class="collapse-item" href="{{ url('/admin/all-mail-logs')}}">Mail Logs</a>
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
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('profile/change-password')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                {{--  <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>  --}}
                                <a class="dropdown-item" href="{{ url('profile/activity-logs')}}">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            class="dropdown-item"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
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
    <a class="scroll-to-top rounded" href="#page-top">
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

    {{-- send mail to pcr patiets --}}
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
                    url: "{{url('zip-file-download')}}",
                    type: "GET",
                    data:
                    {
                        _token: '{{csrf_token()}}',
                        ids:ids
                    },
                    success: function (data)
                    {
                        console.log('Zip download', data);
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





    <script type="text/javascript">

        var patients = <?php echo json_encode($patients) ?>;
        // Area Chart Example
        var ctx = document.getElementById("patientsChart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
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
