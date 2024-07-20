@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h2>FORM DATA KARYAWAN</h2>
		</center>

		<form action="{{url('admin/profil',$detail->karyawan_id)}}/edit" method="post" enctype="multipart/form-data">
			@csrf
			@method("PUT")
			<div class="row mt-5">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Nama Karyawan</label>
						<input type="text" required placeholder="Nama Karyawan" value="{{ucwords($detail->karyawan_nama)}}" name="karyawan_nama" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Jobdesk Karyawan</label>
						<input type="text" required placeholder="Jobdesk Karyawan" value="{{ucwords($detail->karyawan_jobdesk)}}" name="karyawan_jobdesk" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Posisi</label>
						<select name="karyawan_posisi" id="" class="form-control">
							
							<option value="1" @if($detail->karyawan_posisi == 1) selected @endif >Kasir</option>
							<option value="2" @if($detail->karyawan_posisi == 2) selected @endif >Koki</option>
							<option value="3" @if($detail->karyawan_posisi == 3) selected @endif >Runner</option>
							<option value="4" @if($detail->karyawan_posisi == 4) selected @endif >Lainnya</option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Alamat Karyawan</label>
						<input type="text" required placeholder="Alamat Karyawan" name="karyawan_alamat" class="form-control" value="{{ucwords($detail->karyawan_alamat)}}">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" required placeholder="Alamat Karyawan" name="email" value="{{$detail->email}}" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="text" required placeholder="Alamat Karyawan" value="{{ucwords($detail->karyawan_notlp)}}" name="karyawan_notlp" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Tanggal Masuk Kerja</label>
						<input type="date" required placeholder="Alamat Karyawan" value="{{ucwords($detail->karyawan_tgl_masuk)}}" name="karyawan_tgl_masuk" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Foto</label>
						<input type="file" accept="image/*"  placeholder="Alamat Karyawan" name="karyawan_foto" class="form-control">
					</div>
				</div>

				<div class="col-md-12">
					<button class="btn btn-primary float-right">SIMPAN</button>
				</div>

			</div>
		</form>
	</div>
</div>
@endsection