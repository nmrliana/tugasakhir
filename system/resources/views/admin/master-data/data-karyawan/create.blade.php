@extends('template.base')
@section('content')

<div class="card">
	<div class="card-body">
		<center>
			<h2>FORM DATA KARYAWAN</h2>
		</center>

		<form action="{{url('admin/master-data/data-karyawan/create')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="row mt-5">
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Nama Karyawan</label>
						<input type="text" required placeholder="Nama Karyawan" name="karyawan_nama" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Jobdesk Karyawan</label>
						<input type="text" required placeholder="Jobdesk Karyawan" name="karyawan_jobdesk" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Posisi</label>
						<select name="karyawan_posisi" id="" class="form-control">
							<option value="" hidden>-- Pilih Lokasi Pekerjaan Karyawan --</option>
							<option value="1">Kasir</option>
							<option value="2">Koki</option>
							<option value="3">Pramusaji</option>
							<option value="4">Lainnya</option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Shift Karyawan</label>
						<select name="karyawan_sift" id="" class="form-control">
							<option value="" hidden>-- Shift Karyawan --</option>
							<option value="Pagi - Sore">Pagi - Sore</option>
							<option value="Sore - Malam">Sore - Malam</option>
							<option value="Full Time">Full Time</option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Alamat Karyawan</label>
						<input type="text" required placeholder="Alamat Karyawan" name="karyawan_alamat" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" required placeholder="Alamat Karyawan" name="email" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">No Telp</label>
						<input type="text" required placeholder="Alamat Karyawan" name="karyawan_notlp" class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Tanggal Masuk Kerja</label>
						<input type="date" required placeholder="Alamat Karyawan" name="karyawan_tgl_masuk" class="form-control">
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