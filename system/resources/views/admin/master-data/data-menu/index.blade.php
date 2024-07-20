@extends('template.base')
@section('content')

<style>
    /* Tambahkan gaya CSS untuk efek overlay gelap */
    .carousel-item {
      position: relative;
    }

    .carousel-item img {
      width: 100%;
      height: auto;
    }

    .carousel-item::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.2); /* Ubah nilai alpha untuk tingkat kegelapan */
    }

    .carousel-item-not::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8); /* Ubah nilai alpha untuk tingkat kegelapan */
    }

    .carousel-caption {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #fff; /* Teks putih */
    }


      @media (max-width: 768px) {
      .carousel-caption {
        text-align: center;
      }
    }
  </style>


<div class="card">
	<div class="card-body">
		<center>
			<h3>DATA MENU ALAS DAUN</h3>
		</center>

		<div class="table-responsive">
			<a href="{{url('admin/master-data/data-menu/create')}}" class="btn btn-primary btn-sm float-right">TAMBAH DATA MENU</a>
		</div>


		<div class="row mt-4">
			@foreach($list_menu as $item)
			<div class="col-md-4 col-12 mb-4">
				<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						<div class=" active @if($item->menu_status == 1) carousel-item @else carousel-item-not @endif">
							<img src="{{asset('system/public')}}/{{$item->menu_foto}}" class="d-block w-100" alt="{{asset('system/public')}}/{{$item->menu_foto}}" style="height: 230px;" width="100%">
							<div class="carousel-caption d-none d-md-block">
								<h5 class="mt-3">{{ucwords($item->menu_nama)}}</h5>
								<h5 style="font-weight: bold 600;">Rp. {{number_format($item->menu_harga)}}</h5>
								<a href="{{url('admin/master-data/data-menu',$item->menu_id)}}/show" class="btn btn-primary btn-sm">Cek Menu</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach

		</div>
	</div>
</div>

@endsection