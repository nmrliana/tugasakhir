@extends('template.base-kasir')
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
		background: rgba(0, 0, 0, 0.2);
		/* Ubah nilai alpha untuk tingkat kegelapan */
	}

	.carousel-caption {
		position: absolute;
		top: 40%;
		width: 100%;
		left: 30%;
		transform: translate(-30%, -30%);
		color: #fff;
		/* Teks putih */
	}


	@media (max-width: 768px) {
		.carousel-caption {
			text-align: center;
		}
	}
</style>


<style>
	.profile-container {
		position: relative;
		display: inline-block;
	}

	.profile-image {
		width: 60px;
		height: 60px;
		object-fit: cover;
		border-radius: 50%;
		/* Mengubah gambar menjadi kotak dengan sudut sedikit melengkung */
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

	center {
		background: none;
	}

	center {
		background: none;
	}
</style>

<div class="row">
	<div class="col-md-7">

		<div class="row ">
			@foreach($kategori as $k)

			<div class="col-md-12 mb-3">
				<h3>{{ucwords($k->menu_kategori_nama)}}</h3>
			</div>

			@foreach(App\Models\Menu::where('menu_kategori_id',$k->menu_kategori_id)->get() as $item)
			<div class="col-md-3 col-lg-4 col-sm-4 col-6 mb-4">
				<div class="card">
					<a href="{{url('kasir/tambah',$item->menu_id)}}" class="text-dark" style="text-decoration: none">
						<!-- <img src="{{asset('system/public')}}/{{$item->menu_foto}}" class="d-block w-100" alt="{{asset('system/public')}}/{{$item->menu_foto}}" style="height: 170px;" width="100%"> -->
						<div class="card-body">
							<b class="mt-1">{{ucwords($item->menu_nama)}}</b> <br>
							<p style="font-weight: bold 600; float:right">Rp. {{number_format($item->menu_harga)}}</p>

						</div>
					</a>
				</div>
			</div>
			@endforeach


			@endforeach


		</div>
	</div>

	<div class="col-md-5">
		<!-- isi -->
		@php
		$totalHarga = 0;
		foreach($list_pesanan as $item) {
		$totalHarga += $item->menu_harga * $item->menu_qty;
		}
		@endphp
		<div class="card shadow">
			<div class="card-body">
				<center>
					<div class="profile-container">
						<img src="{{ asset('system/public/' . Auth::user()->karyawan_foto) }}" width="40px" onerror=this.onerror=null ; this.src='{{ url('public/assets/images/faces/face4.jpg')}}' ;" class="profile-image">
					</div>
					<br> {{ucwords(Auth::user()->karyawan_nama)}}

					<h3 class="mt-3">Detail Pesanan</h3>
				</center>
				<div class="row">
					<div class="col-md-12">
						@if($totalHarga > 0)
						<form action="{{url('kasir/proses')}}" method="post">
							@csrf

							<div class="row">
								<input type="hidden" name="pesanan_total_harga" value="{{$totalHarga}}">
								<div class="col-md-6">
									<div class="form-grpup">
										<span>Nama Pemesan</span>
										<input type="text" name="pesanan_nama" class="form-control" required placeholder="Nama Pemesan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-grpup">
										<span>Nomor Meja</span>
										<input type="number" name="pesanan_meja_nomor" class="form-control" required min="1" placeholder="Nomor Meja">
									</div>
								</div>
							</div>
							<table class="table table-hover mt-3 table-borderless">
								<thead>
									<tr class="bg-primary">
										<th>Nama Menu</th>
										<th>Qty</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($list_pesanan as $item)
									<tr>
										<td>{{ucwords($item->menu->menu_nama)}} <br>
											{{ucwords($item->menu_harga)}}/Porsi
										</td>
										<td>{{$item->menu_qty}}x</td>
										<td><a href="{{url('kasir/hapus',$item->pesanan_menu_id)}}" class="text-danger">Hapus</a></td>
									</tr>
									@endforeach
									@php
									$total = $list_pesanan->sum('menu_qty');
									@endphp
									<tr class="bg-secondary">
										<td colspan="1">
											<h4>Jumlah Pesanan</h4>
										</td>
										<td colspan="2">
											<h4>{{$total}}</h4>
										</td>
									</tr>

									<tr>
										<td colspan="3">
											<textarea name="pesanan_catatan" placeholder="Catatan Pesanan..." style="height:200px" class="form-control" id=""></textarea>
										</td>
									</tr>
								</tbody>
								<tfoot>

									<tr>
										<td colspan="4">
											<a href="{{url('kasir/reset-pesanan')}}" onclick="return confirm('Yakin reset pesanan?')" class="btn btn-danger btn-sm float-right"> <i class="mdi mdi-loop"></i> Reset</a>
										</td>
									</tr>




									<tr class="bg-secondary">
										<td colspan="4">

											<h4 class="float-right font-weight">Total Pesanan Rp. {{ number_format($totalHarga) }}</h4>
										</td>
									</tr>

									<tr>
										<td colspan="4">
											<button type="submit" class="btn btn-primary btn-lg  btn-block">
												<h3>Proses Pesanan</h3>
											</button>

										</td>
									</tr>
								</tfoot>
							</table>
						</form>
						@endif
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

@if(session('script'))
{!! session('script') !!}
@endif
<script>
	const numberInput = document.getElementById('numberInput');
	let currentValue = 0;

	function decrement() {
		currentValue = parseInt(numberInput.value) - 1;
		updateValue();
	}

	function increment() {
		currentValue = parseInt(numberInput.value) + 1;
		updateValue();
	}

	function updateValue() {
		numberInput.value = currentValue;
	}
</script>
@endsection