@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Galeri Pengunjung</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Upload Galeri
              </button>
        </center>
    </div>
</div>

<div class=" mt-3">
  <div class="card-body">
    <div class="row">
      @foreach($list_galeri as $item)
      <div class="col-md-4">
        <div class="card">
        <img src="{{asset('system/public')}}/{{$item->foto}}" width="100%" height="200px" alt=""><br>
        <div class="card-body">
            <h3>{{ucwords($item->judul_galeri)}}</h3><br>
            <a href="{{url('admin/website/galeri-pengunjung',$item->galeri_id)}}/delete" onclick="return confirm('Yakin hapus gambar ini?')" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Hapus</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Galeri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/website/galeri-pengunjung')}}" method="POST" enctype="multipart/form-data">
            @csrf
           <div class="form-group mt-3">
            <span>Judul Galeri</span>
            <input type="text" class="form-control" name="judul_galeri" required>
           </div>

           <div class="form-group mt-3">
            <span>Foto</span>
            <input type="file" class="form-control" name="foto" accept="image/*" required>
           </div>

           <button class=" btn btn-block btn-primary">Upload Foto</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection