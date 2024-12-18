<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>FMS | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.min.css">
  <!-- Date Picker css -->
  <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/bootstrap-datepicker.min.css">
  <!-- custom css -->
  <script src="{{asset('contents/admin')}}/assets/js/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{asset('contents/admin')}}/assets/css/style.css">
  <!-- Sweet alert js -->
  <script src="{{asset('contents/admin')}}/assets/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
  </div>


  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="{{asset('contents/admin')}}/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Income Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/income/category')}}" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/income/category/add')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Expense Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/expense/category')}}" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/expense/category/add')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Income
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/income')}}" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/income/add')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/expense')}}" class="nav-link">
                  <i class="nav-icon fas fa-file"></i>
                  <p>All</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/expense/add')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-item">
            <a href="{{url('admin/summary')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Monthly Report
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          
          </li>

          <li class="nav-item">
            <a href="{{url('admin/custom/summary')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Custom Report
                <span class="right badge badge-danger"></span>
              </p>
            </a>


          </li>

          <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <a class="nav-link" :href="route('logout')"
                      onclick="event.preventDefault();
                                  this.closest('form').submit();">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>
                    {{ __('Logout') }}
                    <span class="right badge badge-danger"></span>
                  </p>
              </a>
            </form>
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
            <!-- <h1 class="m-0">Dashboard</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('contents/admin')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('contents/admin')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('contents/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('contents/admin')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('contents/admin')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('contents/admin')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('contents/admin')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('contents/admin')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('contents/admin')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('contents/admin')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('contents/admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('contents/admin')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('contents/admin')}}/assets/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('contents/admin')}}/assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('contents/admin')}}/assets/js/pages/dashboard.js"></script>
<!-- Date Picker js -->
<script src="{{asset('contents/admin')}}/assets/js/bootstrap-datepicker.min.js"></script>
<!-- custom js -->
<script src="{{asset('contents/admin')}}/assets/js/custom.js"></script>
</body>
</html>
