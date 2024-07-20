<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
             <center>
              <div class="brand-logo">
                <img src="{{url('public')}}/assets/logo.png" alt="logo">
              </div>
              <h4>Selamat Datang Admin Alas Daun</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
            </center>
            <form class="pt-3" action="{{url('login')}}" method="post">
              @csrf
              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="mt-3">
                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">MASUK</button>
              </div>
              <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                    Keep me signed in
                  </label>
                </div>
                <a href="#" class="auth-link text-black">Forgot password?</a>
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
<!-- container-scroller -->
<!-- base:js -->
<script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="{{url('public')}}/assets/js/off-canvas.js"></script>
<script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
<script src="{{url('public')}}/assets/js/template.js"></script>
<!-- endinject -->


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
  })
</script>
@endif
@endforeach

<script>
  jQuery(document).ready(function(){
    $('.summernote').summernote({
                    height: 230,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                  });
  });
</script>

</body>
</html>