<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fuji Asia Total</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('assets/img/logo.webp') }}" rel="icon">
        <link href="{{ asset('assets/img/logo.webp') }}" rel="apple-touch-icon">

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

        <!-- Font Awesome Icons -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/fontawesome-free/css/all.min.css') }}">

        <!-- overlayScrollbars -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        <!-- DataTables -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

        <!-- Theme style -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css') }}">
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.css') }}">
    </head>

    <style>
        sup {
            color: #fece01;
        }
    </style>

    <body
        class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            data-widget="pushmenu"
                            href="{{ route('dashboard') }}"
                            role="button">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Log Out</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a
                            class="nav-link"
                            data-widget="fullscreen"
                            href="javascript:void(0)"
                            role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="javascript:void(0)" class="brand-link">
                    <img
                        src="{{ asset('assets/img/logo.webp') }}"
                        alt="Fuji Asia Total Logo"
                        class="brand-image img-circle elevation-3"
                        style="opacity: .8; background: white">
                    <span class="brand-text font-weight-light">Fuji Asia Total</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            @if (Auth::user()->profile_photo_path != null)
                            <img
                                src="dist/img/user2-160x160.jpg"
                                class="img-circle elevation-2"
                                alt="User Image">
                            @else
                            <img
                                src="{{ asset('assets/img/logo.webp') }}"
                                class="img-circle elevation-2"
                                alt="User Image"
                                style="background: white">
                            @endif
                        </div>
                        <div class="info">
                            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->email }}</a>
                        </div>
                    </div>

                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input
                                class="form-control form-control-sidebar"
                                type="search"
                                placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul
                            class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any
                            other icon font library -->

                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link ">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item ">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-folder"></i>
                                    <p>
                                        Contruction
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.entry.product') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Entry Data Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.datatable.product') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Datatables Product</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.entry.project') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Entry Data Project</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.datatable.project') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Datatables Project</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-folder"></i>
                                    <p>
                                        Manufacture
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('manufacture.entry.product') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Entry Data Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manufacture.datatable.product') }}" class="nav-link ">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Datatables Product</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('manufacture.entry.project') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Entry Data Project</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('manufacture.datatable.project') }}" class="nav-link active">
                                            <i class="far fa-circle nav-icon active"></i>
                                            <p>Datatables Project</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->

                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Datatable Projects Contruction</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Datatable Projects</li>
                                </ol>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content mb-5">
                    <div class="container-fluid">
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Datatable Projects Contruction</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Kategori</th>
                                                    <th>Deskripsi</th>
                                                    <th>Tanggal</th>
                                                    <th class="not-export-col">Pengaturan</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($projects as $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kategori }}</td>
                                                    <td>{{ $item->deskripsi }}</td>
                                                    <td>@if ($item->tanggal != null)
                                                        {{Carbon\Carbon::parse($item->tanggal)->format('d-F-Y')}}
                                                    @else
                                                        -
                                                    @endif</td>
                                                    <td class="not-export-col">
                                                        <div class="btn-group-vertical">
                                                            <a
                                                                class="btn btn-info"
                                                                href="{{url('/dashboard/manufacture/dataTableProject/editProject/'.$item->nama)}}">Edit</a>
                                                            <a
                                                                class="btn btn-danger"
                                                                href="{{url('/dashboard/manufacture/dataTableProject/deleteProject/'.$item->id)}}">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!--/. container-fluid -->
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="{{ route('main') }}">Fuji Asia Total</a>.</strong>
                All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/adminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script
            src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script
            src="{{ asset('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/adminLTE/dist/js/adminlte.js') }}"></script>

        <!-- PAGE PLUGINS -->
        <script src="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script
            src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

        <script>
            toastr.options = {
                "closeButton": true,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-center",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }

            @if(Session::has('message'))
            var type = "{{Session::get('alert-type', 'info')}}"

            switch (type) {
                case 'info':
                    toastr.info("{{Session::get('message')}}");
                    break;

                case 'success':
                    toastr.success("{{Session::get('message')}}");
                    break;

                case 'warning':
                    toastr.warning("{{Session::get('message')}}");
                    break;

                case 'error':
                    toastr.error("{{Session::get('message')}}");
                    break;
            }
            @endif
        </script>

        <script>
            $(function () {
                $("#example1")
                    .DataTable({
                        "responsive": true,
                        "lengthChange": true,
                        "order": [
                            [3, 'desc']
                        ],
                        "autoWidth": false,
                        "buttons": [
                            {
                                text: 'CSV',
                                extend: 'csvHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            }, {
                                text: 'Excel',
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            }, {
                                text: 'PDF',
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            }, {
                                text: 'Print',
                                extend: 'print',
                                exportOptions: {
                                    columns: ':visible:not(.not-export-col)'
                                }
                            },
                            "colvis"
                        ]
                    })
                    .buttons()
                    .container()
                    .appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    </body>
</html>