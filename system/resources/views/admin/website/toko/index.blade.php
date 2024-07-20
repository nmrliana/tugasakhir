@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                {!!nl2br($toko->maps)!!}
            </div>
            <div class="col-md-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Update Profil Toko</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
        <div class="card-body">
            <form action="{{url('admin/website/toko',$toko->toko_id)}}/update" enctype="multipart/form-data" method="POST">
            @csrf
            @method("PUT")

            <div class="form-group">
                <span>Judul Landing</span>
                <input type="text" name="judul" class="form-control" required value="{{ucwords($toko->judul)}}">
            </div>

            <div class="form-group">
                <span>Tentang</span>
                <textarea name="tentang" class="form-control" id="" cols="30" rows="10">{!!nl2br($toko->tentang)!!}</textarea>
            </div>

            <div class="form-group">
                <span>No Telp.</span>
                <input type="number" name="notlp" class="form-control" required value="{{ucwords($toko->notlp)}}">
            </div>

            <div class="form-group">
                <span>Email</span>
                <input type="email" name="email" class="form-control" required value="{{ucwords($toko->email)}}">
            </div>
           
            <div class="form-group">
                <span>Alamat</span>
                <input type="text" name="alamat" class="form-control" required value="{{ucwords($toko->alamat)}}">
            </div>

            <div class="form-group">
                <span>Gambar</span>
                <input type="file" accept="image/*" name="foto_utama" class="form-control">
            </div>

            <button class="btn btn-primary mt-3">Update</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
                <table class="table">
                    <tr>
                        <th>Judul Landing</th>
                        <td>: {{ucwords($toko->judul)}}</td>
                    </tr>

                    <tr>
                        <th>Tentang</th>
                        <td>: {!!nl2br($toko->tentang)!!}}</td>
                    </tr>

                    <tr>
                        <th>No Telp.</th>
                        <td>: {{$toko->notlp}}</td>
                    </tr>

                    <tr>
                        <th>Email</th>
                        <td>: {{$toko->email}}</td>
                    </tr>

                    <tr>
                        <th>Alamat</th>
                        <td>: {{ucwords($toko->alamat)}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection