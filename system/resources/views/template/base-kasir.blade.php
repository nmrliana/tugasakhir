<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ALAS DAUN</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public')}}/assets/logo-putih.png" />
  
  <style>
    /* Ensuring that there is no double scroll bar */
    html, body {
      height: 100%;
      overflow: hidden;
    }
    .main-panel {
      height: 100vh;
      overflow-y: auto;
    }
    .content-wrapper {
      padding: 1rem;
    }
  </style>
</head>

<body class="sidebar-icon-only">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4" style="max-height: 15vh !important; background-color: #25695c;">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <div class="navbar-brand-wrapper">
            <a class="navbar-brand brand-logo" href="index.html"><img src="{{url('public')}}/assets/logo-putih.png" width="60px" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('public')}}/assets/logo.png" alt="logo"/></a>
          </div>
          <h1 class="font-weight-bold mb-0 d-none d-md-block mt-1 pb-3">RM. Seafood Alas Daun</h1>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</h4>
            </li>

            <li class="nav-item dropdown mr-2">
              <a class="nav-link btn p-2 btn-light text-dark count-indicator dropdown-toggle d-flex align-items-center justify-content-center" href="{{url('kasir/history')}}">
                <i class="mdi mdi-restore mx-0"></i> History Pesanan
              </a>
            </li>

            <li class="nav-item dropdown mr-2">
              <a class="nav-link btn p-2 btn-light text-danger count-indicator dropdown-toggle d-flex align-items-center justify-content-center" href="{{url('logout')}}" onclick="return confirm('Yakin untuk keluar aplikasi?')">
                <i class="mdi mdi-logout mx-0"></i> Keluar
              </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('public')}}/assets/js/off-canvas.js"></script>
  <script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
  <script src="{{url('public')}}/assets/js/template.js"></script>
  <script src="{{url('public')}}/assets/js/chart.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{url('public')}}/assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Notifikasi -->
  @foreach(['success', 'warning', 'error', 'info'] as $status)
  @if (session($status))
  <script>
    Swal.fire({
      icon: "{{ $status }}",
      title: "{{ Str::upper($status) }}",
      text: "{{ session($status) }}!",
      showConfirmButton: false,
      timer: 3000
    });
  </script>
  @endif
  @endforeach

  <script>
    jQuery(document).ready(function(){
      $('.summernote').summernote({
        height: 230, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
      });
    });
  </script>

  <script>
    $('.dataTable').DataTable();
  </script>
</body>

</html>
