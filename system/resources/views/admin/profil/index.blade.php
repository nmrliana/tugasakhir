@extends('template.base')
@section('content')


<div class="mt-3 container">

	<div class="card ">
		<div class="card-body">
			<center>
				<h3>PROFIL AKUN</h3>
			</center>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-md-4">
			<img src="{{asset('system/public')}}/{{$auth->karyawan_foto}}" width="100%" onerror="this.onerror=null;this.src='{{url("public")}}/assets/images/faces/face4.jpg';" alt="{{ucwords($auth->karyawan_nama)}}" style="border-radius: 10px;">

		</div>

		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-borderless table-hover">
							<tr>
								<th>Nama </th>
								<td>: {{ucwords($auth->karyawan_nama)}}</td>
							</tr>
							<tr>
								<th>Email </th>
								<td>: {{ucwords($auth->email)}}</td>
							</tr>
							<tr>
								<th>Jobdesk </th>
								<td>: {{ucwords($auth->karyawan_jobdesk)}}</td>
							</tr>

							<tr>
								<th>Posisi </th>
								<td>: {{ucwords($auth->karyawan_posisi)}}</td>
							</tr>

							<tr>
								<th>Alamat </th>
								<td>: {{ucwords($auth->karyawan_alamat)}}</td>
							</tr>
							

							<tr>
								<th>No. Telp </th>
								<td>: {{ucwords($auth->karyawan_notlp)}}</td>
							</tr>
						</table>

						<a href="{{url('admin/profil',$auth->karyawan_id)}}/edit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit Akun</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection