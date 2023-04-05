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

        <!-- Theme style -->
        <link
            rel="stylesheet"
            href="{{ asset('assets/adminLTE/dist/css/adminlte.min.css') }}">
    </head>
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
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="index3.html" class="nav-link">Home</a>
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
                                src="{{ asset(Auth::user()->profile_photo_url) }}"
                                class="img-circle elevation-2"
                                alt="User Image"
                                style="width: 33px; height: 33px; object-fit: cover; object-position: center">
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
                                <a href="{{ route('dashboard') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-folder"></i>
                                    <p>
                                        Contruction
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.entry.product') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Entry Data Product</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.datatable.product') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Datatables Product</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ route('dashboard.entry.project') }}" class="nav-link">
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

                            <li class="nav-item">
                                <a href="#" class="nav-link">
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
                                        <a href="{{ route('manufacture.datatable.product') }}" class="nav-link">
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
                                        <a href="{{ route('manufacture.datatable.project') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
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
                            <div class="col-sm-12 mb-3">
                                <h1 class="m-0">Dashboard</h1>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Product Construction</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Berat</th>
                                                        <th>Ukuran</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($productContruction as $item)
                                                        <tr>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->kategori }}</td>
                                                            <td>@if ($item->berat != null)
                                                                {{ $item->berat }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                            <td>@if ($item->ukuran != null)
                                                                {{ $item->ukuran }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('dashboard.entry.product') }}" class="btn btn-sm btn-info float-left">Insert New Product</a>
                                        <a href="{{ route('dashboard.datatable.product') }}" class="btn btn-sm btn-secondary float-right">View All Product</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>

                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Project Manufacture</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($projectManufacture as $item)
                                                        <tr>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->kategori }}</td>
                                                            <td>@if ($item->deskripsi != null)
                                                                {{ $item->deskripsi }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                            <td>@if ($item->tanggal != null)
                                                                {{Carbon\Carbon::parse($item->tanggal)->format('d-F-Y')}}
                                                            @else
                                                                -
                                                            @endif</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('manufacture.entry.project') }}" class="btn btn-sm btn-info float-left">Insert New Project</a>
                                        <a href="{{ route('manufacture.datatable.project') }}" class="btn btn-sm btn-secondary float-right">View All Project</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Project Construction</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Deskripsi</th>
                                                        <th>Tanggal</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($projectContruction as $item)
                                                        <tr>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->kategori }}</td>
                                                            <td>@if ($item->deskripsi != null)
                                                                {{ $item->deskripsi }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                            <td>@if ($item->tanggal != null)
                                                                {{Carbon\Carbon::parse($item->tanggal)->format('d-F-Y')}}
                                                            @else
                                                                -
                                                            @endif</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('dashboard.entry.project') }}" class="btn btn-sm btn-info float-left">Insert New Project</a>
                                        <a href="{{ route('dashboard.datatable.project') }}" class="btn btn-sm btn-secondary float-right">View All Project</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>

                                <div class="card">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Product Manufacture</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Berat</th>
                                                        <th>Ukuran</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($productManufacture as $item)
                                                        <tr>
                                                            <td>{{ $item->nama }}</td>
                                                            <td>{{ $item->kategori }}</td>
                                                            <td>@if ($item->berat != null)
                                                                {{ $item->berat }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                            <td>@if ($item->ukuran != null)
                                                                {{ $item->ukuran }}
                                                            @else
                                                                -
                                                            @endif</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <a href="{{ route('manufacture.entry.product') }}" class="btn btn-sm btn-info float-left">Insert New Product</a>
                                        <a href="{{ route('manufacture.datatable.product') }}" class="btn btn-sm btn-secondary float-right">View All Product</a>
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- /.row -->

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
    </body>
</html>