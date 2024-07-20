@extends('template.base')
@section('content')


<link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">
<div class="card">
	<div class="card-body">
		<center>
			<h2>Data Karyawan</h2>
		</center>

		<a href="{{url('admin/master-data/data-karyawan/create')}}" class="btn mb-4 btn-primary float-right">Tambah Pegawai</a>
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered" id="example">
				<thead>
					<tr class="bg-primary ">
						<th class="text-center">No</th>
						<th>Nama Karyawan</th>
						<th>E-Mail</th>
						<th>JobDesk</th>
						<th class="text-center">Sift</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>

				<tbody>
					@foreach($list_karyawan as $item)
					<tr>
						<td class="text-center">{{$loop->iteration}}</td>
						<td>{{ucwords($item->karyawan_nama)}} <br>
						@if($item->karyawan_posisi == 1)
						<span>(Kasir)</span>

						@elseif($item->karyawan_posisi == 2)
						<span>(Koki)</span>

						@elseif($item->karyawan_posisi == 3)
						<span>(Pramusaji)</span>

						@elseif($item->karyawan_posisi == 4)
						<span>(Lainnya)</span>
						@endif
						</td>
						<td>{{$item->email}}</td>
						<td>{{ucwords($item->karyawan_jobdesk)}}</td>
						<td>{{$item->karyawan_sift}}</td>
						<td>
							<center>
								<div class="btn-group">
									<a href="{{url('admin/master-data/data-karyawan',$item->karyawan_id)}}/show" class="btn btn-primary btn-sm">Lihat</a>
									<a href="{{url('admin/master-data/data-karyawan',$item->karyawan_id)}}/edit" class="btn btn-warning btn-sm">Edit</a>
									<a href="{{url('admin/master-data/data-karyawan',$item->karyawan_id)}}/delete" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
								</div>
							</center>
						</td>
					</tr>
					@endforeach
				</tbody>


				<tfoot>
					<tr class="bg-primary ">
						<th class="text-center">No</th>
						<th>Nama Karyawan</th>
						<th>E-Mail</th>
						<th>JobDesk</th>
						<th>Sift</th>
						<th class="text-center">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
<script>
	new DataTable('#example');
</script>
@endsection