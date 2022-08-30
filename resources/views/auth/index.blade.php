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
  <link rel="stylesheet" href="{{ asset('assets/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/vertical-layout-light/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('assets/img/logo.png')}}" alt="logo">
              </div>
              <h4>Selamat Datang di Kantin KBA</h4>
              <form action="{{ route('auth.login')}}" method="post" class="pt-3">
              @csrf
              @method('post')
                <div class="form-group">
                  <input type="text" class="form-control form-control-sm" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-sm"name="password" placeholder="Password">
                </div>
                @if (session('error'))
                  <span class="text-danger">{{session('error')}}</span>
                @endif
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- plugins:js -->
  <script src="assets/script/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/script/jquery.dataTables.js"></script>
  <script src="assets/script/dataTables.bootstrap4.js"></script>
  <script src="assets/script/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/script/off-canvas.js"></script>
  <script src="assets/script/hoverable-collapse.js"></script>
  <script src="assets/script/template.js"></script>
  {{-- <script src="assets/script/settings.js"></script>
  <script src="assets/script/todolist.js"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  {{-- <script src="assets/script/dashboard.js"></script> --}}
  <!-- End custom js for this page-->
</body>

</html>