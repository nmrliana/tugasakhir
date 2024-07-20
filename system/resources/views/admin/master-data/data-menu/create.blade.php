@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h3>FORM TAMBAH MENU</h3>
		</center>

		<form action="" method="post" class="mt-5" enctype="multipart/form-data">
			@csrf
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Nama Menu</label>
						<input type="text" placeholder="Nama Menu" name="menu_nama" required class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					@if($countKategori == 0)
					<button type="button" class="btn btn-danger mb-5 " data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-warning"></i> Tambah Kategori Terlebih Dahulu
					</button>

					
					@else
					<div class="form-group">
						<label for="">Kategori Menu</label>
						<select name="menu_kategori_id" id="" class="form-control" required>
							<option value="" hidden>-- Kategori Menu --</option>
							@foreach($list_kategori as $item)
							<option value="{{$item->menu_kategori_id}}">{{ucwords($item->menu_kategori_nama)}}</option>
							@endforeach
						</select>
					</div>
					@endif
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Harga Menu</label>
						<input type="number" placeholder="Rp. xxx" name="menu_harga" required class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Gambar Menu</label>
						<input type="file" accept="image/*" placeholder="Nama Menu" name="menu_foto" required class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Nama Satuan</label>
						<select class="form-control" name="menu_satuan" required>
							<option value="Porsi">Porsi</option>
							<option value="Unit">Unit</option>
							<option value="Kilo">Kilo</option>
						</select>
					</div>
				</div>

				<div class="col-md-12">
					<button class="btn btn-primary float-right mt-5">Simpan Menu</button>
				</div>




			</div>
		</form>

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
	</div>
</div>
@endsection