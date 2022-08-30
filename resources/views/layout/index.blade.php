<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Kantin KBA</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/select.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <!-- End plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap.min.css')}}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <!-- evo calendar -->
  <link rel="stylesheet" href="{{ asset('assets/evo-calendar/css/evo-calendar.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/evo-calendar/css/evo-calendar.orange-coral.min.css')}}">
  <!-- end evo -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a href="{{ url('/')}}" class="navbar-brand brand-logo mr-5">KANTIN KBA</a>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item">
            <img src="{{ asset('assets/img/logo.png')}}" alt="logo" style="width:180px"/>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('transaksi.create')}}">
              <i class="ti-exchange-vertical menu-icon"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('topup.create')}}">
              <i class="ti-money menu-icon"></i>
              <span class="menu-title">Topup</span>
            </a>
          </li>
          @if (auth()->user()->role_id == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('santri.index')}}">
              <i class="ti-user menu-icon"></i>
              <span class="menu-title">Data Santri</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index')}}">
              <i class="ti-settings menu-icon"></i>
              <span class="menu-title">Data User</span>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('auth.logout')}}">
              <i class="ti-power-off menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
                @yield('content')
            </div>
          </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets/script/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/script/jquery.dataTables.js')}}"></script>
  <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('assets/script/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('assets/script/dataTables.select.min.js')}}"></script>
  <script src="{{ asset('assets/script/select2.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/script/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/script/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/script/template.js')}}"></script>
  <!-- endinject -->

  <!-- select2 -->
  <script src="{{ asset('assets/script/select2.js')}}"></script>

  @yield('script')
</body>

</html>
