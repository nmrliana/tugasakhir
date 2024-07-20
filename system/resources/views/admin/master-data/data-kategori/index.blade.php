@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h3>DATA KATEGORI MENU</h3>
		</center>
		<button type="button" class="btn btn-primary mb-5 float-right" data-toggle="modal" data-target="#exampleModal">
			<i class="fa fa-plus"></i> Tambah Kategori
		</button>

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Kategori Menu</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="{{url('admin/master-data/data-kategori/create')}}" method="post" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<span>Nama Kategori</span>
								<input type="text" class="form-control" name="menu_kategori_nama" required placeholder="Nama Kategori">
							</div>

							<div class="form-group">
								<span>Gambar Kategori</span>
								<input type="file" accept="image/*" class="form-control" name="menu_kategori_foto" required placeholder="Nama Kategori">
							</div>

							<button class="btn btn-primary mt-3 float-right">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal -->

		<div class="table-responsive mt-3">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr class="bg-primary text-white">
						<th>No</th>
						<th class="text-center">Gambar</th>
						<th>Nama Kategori Makanan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>

				<tbody>
					@foreach($list_kategori as $item)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td class="text-center">
							<img src="{{asset('system/public')}}/{{$item->menu_kategori_foto}}" width="100%" alt="">
						</td>
						<td>{{ucwords($item->menu_kategori_nama)}}</td>
						<td class="text-center">
							<div class="btn-group">
								<a href="{{url('admin/master-data/data-kategori',$item->menu_kategori_id)}}/delete" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>

				<tfoot>
					<tr class="bg-primary text-white">
						<th>No</th>
						<th class="text-center">Gambar</th>
						<th>Nama Kategori Makanan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>

@endsection