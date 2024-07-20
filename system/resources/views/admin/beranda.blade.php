@extends('template.base')
@section('content')

<div class="row">
	<div class="col-md-3">
		<div class="card bg-primary">
			<div class="card-body">
				<center>
					<h3>Jumlah Pesanan</h3>
					<h4>{{$jumlahPesanan}}</h4>
				</center>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card bg-primary">
			<div class="card-body">
				<center>
					<h3>Pesanan Baru</h3>
					<h4>5</h4>
				</center>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="card bg-primary">
			<div class="card-body">
				<center>
					<h4>Pendapatan Hari Ini </h4>
					<h4>Rp. {{number_format($pendapatanHarian)}}</h4>
				</center>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="card bg-primary">
			<div class="card-body">
				<center>
					<h4>Pendapatan/Minggu</h4>
					<h4>Rp. {{$mingguan}}</h4>
				</center>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card mt-5">
			<div class="card-body">
				<canvas id="myChart"></canvas>
			</div>
		</div>
	</div>
	
	<div class="col-md-6 mt-5">
		<div class="card">
			<div class="card-body">
				<canvas id="myChartMenu"></canvas>
			</div>
		</div>
		
	</div>

	

	<!-- Modal -->
	<div class="modal fade" id="modalStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal Pengeluaran Hari Ini</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="">
						<div class="card alert-danger mb-3">
							<div class="card-body">
								Masukan modal awal hari ini !!!
							</div>
						</div>
					</div>
					<form action="{{url('admin/modal-awal')}}" method="post">
						@csrf
						<div class="form-group">
							<span>Modal Awal</span>
							<input type="number" class="form-control" placeholder="Rp. xxx" required name="modal_awal">
						</div>

						<div class="form-group">
							<span>Deskripsi</span>
							<textarea name="stok_detail" id="" class="form-control" placeholder="Deksripsikan"></textarea>
						</div>

						<button class="btn btn-primary mt-3">Buat Modal </button>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@if($cekModal == 0)
<script>
	$(document).ready(function() {
		$('#modalStok').modal('show');

	});
</script>
@endif

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
	const ctx = document.getElementById('myChart');
	const ctx2 = document.getElementById('myChartMenu');

	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [@foreach ($list_menu as $item)
				"{{ Str::limit(ucwords($item->menu_nama),20) }}",
				@endforeach],
			datasets: [{
				label: 'GRAFIK MENU TERLARIS MINGGUAN',
				data: [
					@foreach ($list_menu as $item)
					"{{ $item->totalPesanan }}",
					@endforeach
					],
				borderWidth: 1,
				backgroundColor: '#25695c',
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});

	new Chart(ctx2, {
		type: 'line',
		data: {
			labels: [
				[@foreach ($list_kategori->sortByDesc('totalKategori') as $item)
					"{{ Str::limit(ucwords($item->menu_kategori_nama),20) }}",
					@endforeach]
				],
			datasets: [{
				label: 'Menu Terlaris',
				data: [
					@foreach ($list_kategori->sortByDesc('totalKategori') as $item)
					"{{ $item->totalKategori }}",
					@endforeach
					],
				borderWidth: 1,
				backgroundColor: '#25695c',
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});


</script>



@endsection