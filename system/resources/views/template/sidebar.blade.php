@php

function checkRouteActive($route){
  if(Route::current()->uri == $route) return 'active';
}
@endphp

<style type="text/css">
  .active{
    background-color: #269A0B !important;
  }

  .nav-item:hover a{
    background-color: #269A0B !important;;
  }
</style>

<ul class="nav" style="background-color:#25695c !important">



<style>
  .profile-container {
    position: relative;
    display: inline-block;
  }

  .profile-image {
    width: 60px;
      height: 60px;
      object-fit: cover;
      border: 3px solid #11ec2f;
      border-radius: 50%; /* Mengubah gambar menjadi kotak dengan sudut sedikit melengkung */
  }

  .edit-icon {
    position: absolute;
    top: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border-radius: 50%;
    padding: 2px;
    font-size: 12px;
    text-decoration: none;
  }

  .profile-name {
    color: #ffffff;
    margin-top: 10px;
    display: block;
  }

  .profile-job {
    margin: 0;
  }
  center{
    background: none;
  }

  center{
    background: none;
  }
</style>
  <!-- tampilan foto, nama dan jabatan -->
  <li class="nav-item sidebar-category mb-5">
    <center>
      <div class="profile-container">
        <img src="{{url('system/public')}}/{{ucwords(Auth::user()->karyawan_foto)}}" alt="image" class="profile-image"> 
        <a class="edit-icon">
          <i class="fas fa-pencil-alt"></i>
        </a>
      </div>
      <b class="profile-name">{{ucwords(Auth::user()->karyawan_nama)}}</b>
      <p class="profile-job">{{ucwords(Auth::user()->karyawan_jobdesk)}}</p>
    </center>
 </li>
 <!-- end tampilan -->


 <li class="nav-item">
  <a class="nav-link {{checkRouteActive('admin/beranda')}}" href="{{url('admin/beranda')}}">
    <i class="mdi mdi-view-quilt menu-icon"></i>
    <span class="menu-title">Beranda</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <i class="fa fa-cubes menu-icon"></i>
    <span class="menu-title">Master Data</span>
    <i class="menu-arrow"></i>
  </a>

  <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">

      <li class="nav-item"> 
        <a class="nav-link {{checkRouteActive('admin/master-data/data-karyawan')}}" href="{{url('admin/master-data/data-karyawan')}}">Data Karyawan</a>
      </li>

      <li class="nav-item"> 
        <a class="nav-link" href="{{url('admin/master-data/data-menu')}}">Data Menu</a>
      </li>

      <li class="nav-item"> 
        <a class="nav-link" href="{{url('admin/master-data/data-kategori')}}">Data Kategori Menu</a>
      </li>

    </ul>
  </div>

</li>

<li class="nav-item">
  <a class="nav-link" href="{{url('admin/data-stok')}}">
    <i class="mdi mdi-view-headline menu-icon"></i>
    <span class="menu-title">Modal Awal</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" href="{{url('admin/laporan',date('Y'))}}">
    <i class="mdi mdi-chart-pie menu-icon"></i>
    <span class="menu-title">Pelaporan</span>
  </a>
</li>


<li class="nav-item sidebar-category">
  <p>Website</p>
  <span></span>
</li>

<!-- anak -->
<li class="nav-item">
  <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
    <i class="fa fa-globe menu-icon"></i>
    <span class="menu-title">Website</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="auth">
    <ul class="nav flex-column sub-menu">

      <li class="nav-item"> 
        <a class="nav-link" href="{{url('admin/website/galeri-pengunjung')}}"> Galeri Pengunjung </a>
      </li>

      <li class="nav-item"> 
        <a class="nav-link" href="{{url('admin/website/galeri-slide')}}"> Slider </a>
      </li>

      <li class="nav-item"> 
        <a class="nav-link" href="{{url('admin/website/toko')}}"> Profil Website </a>
      </li>

    </ul>
  </div>
</li>
<!-- end anak -->


<li class="nav-item sidebar-category">
  <p>Akun</p>
  <span></span>
</li>

<li class="nav-item">
  <a class="nav-link {{checkRouteActive('admin/profil')}}" href="{{url('admin/profil')}}">
    <i class="mdi mdi-account menu-icon"></i>
    <span class="menu-title">Profil Akun</span>
  </a>
</li>


</ul>