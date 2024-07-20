<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Alas Daun</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="{{url('public')}}/landing/lib/animate/animate.min.css" rel="stylesheet">
  <link href="{{url('public')}}/landing/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{url('public')}}/landing/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{{url('public')}}/landing/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{{url('public')}}/landing/css/style.css" rel="stylesheet">
  <link rel="shortcut icon" href="{{url('public')}}/assets/logo-putih.png" />
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
  </div>
  <!-- Spinner End -->


  <!-- Topbar Start -->
  <div class="container-fluid bg-dark text-light px-0 py-2">
    <div class="row gx-0 d-none d-lg-flex">
      <div class="col-lg-7 px-5 text-start">
        <div class="h-100 d-inline-flex align-items-center me-4">
          <span class="fa fa-phone-alt me-2"></span>
          <span>{{$toko->notlp}}</span>
        </div>
        <div class="h-100 d-inline-flex align-items-center">
          <span class="far fa-envelope me-2"></span>
          <span>{{$toko->email}}</span>
        </div>
      </div>
      <div class="col-lg-5 px-5 text-end">
        <div class="h-100 d-inline-flex align-items-center mx-n2">
          <span>Follow Us:</span>
          <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
          <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
          <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->


  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
    <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h1 class="m-0">  <img class="img-fluid rounded" data-wow-delay="0.1s" src="{{url('public')}}/assets/logo.png" width="50px"> Alas Daun</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.html" class="nav-item nav-link active"></a>
        <a href="about.html" class="nav-item nav-link"></a>
        <a href="service.html" class="nav-item nav-link"></a>
        <a href="project.html" class="nav-item nav-link"></a>
        {{-- <a href="contact.html" class="nav-item nav-link">Contact</a> --}}
      </div>
      <a href="{{url('login')}}" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Masuk Admin<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
  </nav>
  <!-- Navbar End -->


  <!-- Carousel Start -->
  <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="{{asset('system/public')}}/{{$toko->foto_utama}}" height="900px"  onerror="this.onerror=null;this.src='{{url('public/background.png')}}';" alt="Image">
          <div class="carousel-caption">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <h1 class="display-1 text-white mb-5 animated slideInDown">{{$toko->judul}}</h1>
                </div>
              </div>
            </div>
          </div>
        </div>

        @foreach($list_slide as $slide)
      <div class="carousel-item">
        <img class="w-100" src="{{asset('system/public')}}/{{$slide->foto}}" height="900px" alt="Image">
        <div class="carousel-caption">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <h3 class="display-1 text-white mb-5 animated slideInDown">{{ucwords($slide->judul_slide)}}</h3>
                        <p>{{$slide->deskripsi}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
      @endforeach

      </div>

      
      <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
    data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<!-- Carousel End -->


<!-- Top Feature Start -->
<div class="container-fluid top-feature py-5 pt-lg-0">
  <div class="container py-5 pt-lg-0">
    <div class="row gx-0">
      <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
          <div class="d-flex">
            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
              <i class="fa fa-times text-primary"></i>
            </div>
            <div class="ps-3">
              <h4>Kebersihan</h4>
              <span>Menjamin makanan yang bersihan 100% Higienis</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
        <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
          <div class="d-flex">
            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
              <i class="fa fa-users text-primary"></i>
            </div>
            <div class="ps-3">
              <h4>Cepat Saji</h4>
              <span>Pelayanan cepat saji, cita rasa tetap diutamakan</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
        <div class="bg-white shadow d-flex align-items-center h-100 px-5" style="min-height: 160px;">
          <div class="d-flex">
            <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
              <i class="fa fa-phone text-primary"></i>
            </div>
            <div class="ps-3">
              <h4>Rasa Terjamin</h4>
              <span>Rasakan Kenikmatan yang Menggugah Selera!</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Top Feature End -->


<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-end">
      <div class="col-lg-4 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid rounded" data-wow-delay="0.1s" src="{{url('public')}}/assets/logo.png">
      </div>
      <div class="col-lg-6 col-md-8 wow fadeInUp" data-wow-delay="0.3s">
        <h1 class="display-5 mb-4">Tentang Alas Daun</h1>
        <p class="mb-4">{!!nl2br($toko->tentang)!!}</p>
      </div>
    </div>
  </div>
</div>
<!-- About End -->


<!-- Facts Start -->
<div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="{{asset('system/public')}}/{{$toko->foto_utama}}">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.1s">
        <h1 class="display-4 text-white" data-toggle="counter-up">{{$total}}</h1>
        <span class="fs-5 fw-semi-bold text-light">Total Menu</span>
      </div>
      <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.3s">
        <h1 class="display-4 text-white" data-toggle="counter-up">{{$today}}</h1>
        <span class="fs-5 fw-semi-bold text-light">Transaksi Harian</span>
      </div>
      <div class="col-sm-6 col-lg-4 text-center wow fadeIn" data-wow-delay="0.5s">
        <h1 class="display-4 text-white" data-toggle="counter-up">{{$month}}</h1>
        <span class="fs-5 fw-semi-bold text-light">Transaksi Bulan Ini</span>
      </div>
    </div>
  </div>
</div>
<!-- Facts End -->




<!-- Projects Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <p class="fs-5 fw-bold text-primary">Galeri RM. Alas Daun</p>
      <h1 class="display-5 mb-5">Galeri RM. Alas Daun</h1>
    </div>
    <div class="row wow fadeInUp" data-wow-delay="0.3s">
     
    </div>
    <div class="row g-4 portfolio-container">
      @foreach($list_galeri as $item)
      <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.3s">
        <div class="portfolio-inner rounded">
          <img class="img-fluid" src="{{asset('system/public')}}/{{$item->foto}}" width="100%" alt="">
          <div class="portfolio-text">
            <h4 class="text-white mb-4">{{ucwords($item->judul_galeri)}}</h4>
            <div class="d-flex">
              <a class="btn btn-lg-square rounded-circle mx-2" href="{{asset('system/public')}}/{{$item->foto}}" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
            </div>
          </div>
        </div>
      </div>
@endforeach
    </div>
  </div>
</div>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="row g-5">
      <div class="col-lg-4 col-md-6">
        <h4 class="text-white mb-4">Tentang</h4>
        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{$toko->alamat}}</p>
        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{$toko->notlp}}</p>
        <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{$toko->email}}</p>
        <div class="d-flex pt-2">
          <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
          <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-lg-8 col-md-6">
        <h4 class="text-white mb-4">Maps</h4>
      {!!nl2br($toko->maps)!!}
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->


<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        &copy; <a class="border-bottom" href="#">Alas Daun</a>, All Right Reserved.
      </div>
      <div class="col-md-6 text-center text-md-end">
        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Designed By <a class="border-bottom" href="#">Politap</a> 
      </div>
    </div>
  </div>
</div>
<!-- Copyright End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url('public')}}/landing/lib/wow/wow.min.js"></script>
<script src="{{url('public')}}/landing/lib/easing/easing.min.js"></script>
<script src="{{url('public')}}/landing/lib/waypoints/waypoints.min.js"></script>
<script src="{{url('public')}}/landing/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{url('public')}}/landing/lib/counterup/counterup.min.js"></script>
<script src="{{url('public')}}/landing/lib/parallax/parallax.min.js"></script>
<script src="{{url('public')}}/landing/lib/isotope/isotope.pkgd.min.js"></script>
<script src="{{url('public')}}/landing/lib/lightbox/js/lightbox.min.js"></script>

<!-- Template Javascript -->
<script src="{{url('public')}}/landing/js/main.js"></script>
</body>

</html>