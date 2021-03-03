<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/jpg" href="{{ asset('static-uploads/logo.png') }}">

  <title>@yield('admin_title', config('app.name')) | {{ config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- vue init css -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div id="app" class="wrapper">
    
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-primary" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%);">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

            <!-- Profile Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#"> <i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%) !important;">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
            <img src="{{ asset('static-uploads/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light font-weight-bold">{{ config('app.name') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                    </a>
                </li>

                {{-- Profile --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                    <p>Profile</p>
                    </a>
                </li>

                {{-- User List --}}
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                    <p> User List </p>
                    </a>
                </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Dashboard Short Overview </h3>
                    </div>
                    <div class="card-body">
                        <h2>Welcome to Dashboard</h2>

                        <p>
                            <!-- use router-link component for navigation. -->
                            <!-- specify the link by passing the `to` prop. -->
                            <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
                            <router-link to="/foo">Go to Foo</router-link>
                            <router-link to="/bar">Go to Bar</router-link>
                        </p>
                        <!-- route outlet -->
                        <!-- component matched by the route will render here -->
                        <router-view></router-view>

                    </div>
                    <!-- /.card-body -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer bg-dark" style="background-image: linear-gradient(0deg, #000041 0%, rgba(19,28,117,0.74) 100%) !important;">
            <div class="container">
            <!-- To the right -->
            <div class="float-md-right text-white">
                Developed By <a href="https://facebook.com/abdulmajidcse/" target="_blank" class="text-white font-weight-bold border-bottom text-uppercase"> Abdul Majid </a>
            </div>
            <!-- Default to the left -->
            <span> {{ date('Y') }} &copy; All Rights Reserved by {{ config('app.name') }}.</span>
            </div>
        </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- vue init js -->
    <script src="{{ asset('js/app.js') }}"></script>

    <script>

    // file input decorate
    $(document).ready(function () {
        bsCustomFileInput.init();
    })

    $(function () {
        // Summernote
        $('.post-content').summernote()
    })

    // datatable view
    $('#dataTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

    </script>

</body>
</html>