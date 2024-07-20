@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Slider Landing</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Upload Slider
              </button>
        </center>
    </div>
</div>

<div class=" mt-3">
  <div class="card-body">
    <div class="row">
      @foreach($list_slide as $item)
      <div class="col-md-12 mb-3">
        <div class="card">
          <div class="card-body">
           <div class="row">
            <div class="col-md-6">
              <img src="{{asset('system/public')}}/{{$item->foto}}" height="200px" width="100%" alt="">
            </div>
            <div class="col-md-6">
              <h3>{{ucwords($item->judul_slide)}}</h3>
              <p>{{$item->deskripsi}}</p>
              <br>
              <a href="{{url('admin/website/galeri-slide',$item->slide_id)}}/delete" onclick="return confirm('Yakin hapus gambar ini?')" class="btn btn-danger btn-sm"><b><i class="fa fa-times"></i></b>Hapus</a>
            </div>
           </div>
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
          <h5 class="modal-title" id="exampleModalLabel">Upload Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{url('admin/website/galeri-slide')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
              <span>Judul Slide</span>
              <input type="text" class="form-control" name="judul_slide" required>
             </div>

             <div class="form-group mt-3">
              <span>Deskripsi Slide</span>
              <textarea name="deskripsi" class="form-control" id="" cols="30" rows="5"></textarea>
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