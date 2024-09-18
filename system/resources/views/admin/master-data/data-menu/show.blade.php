@extends('template.base')
@section('content')

<div class="row">
    <div class="col-md-6">
        <img src="{{asset('system/public')}}/{{$detail->menu_foto}}" class="d-block w-100" alt="{{asset('system/public')}}/{{$detail->menu_foto}}" width="100%">
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h3>{{ucwords($detail->menu_nama)}}</h3>
                (Kategori)
                <h3 class="float-right">Rp. {{number_format($detail->menu_harga)}}</h3>


                <form action="{{url('admin/master-data/data-menu',$detail->menu_id)}}/update-status" class="mt-3" method="POST">
                    @csrf
                    <span>Status Ketersediaan</span> <br>
                    <input type="radio" name="menu_status" @if($detail->menu_status == 1) checked @endif value="1"> Tersedia <br>
                    <input type="radio" name="menu_status" @if($detail->menu_status == 0) checked @endif value="0"> Tidak Tersedia <br>

                    <button class="btn btn-sm btn-primary mt-3">Update Menu</button>
                </form>

            </div>
        </div>

        <button class="btn btn-primary btn-sm mt-3 mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Edit Menu
        </button>

        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="{{url('admin/master-data/data-menu',$detail->menu_id)}}/update" method="post" class="mt-5" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Menu</label>
                                <input type="text" placeholder="Nama Menu" name="menu_nama" required class="form-control" value="{{ucwords($detail->menu_nama)}}">
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
                                    <option value="{{$item->menu_kategori_id}}" @if($item->menu_kategori_id == $detail->menu_kategori_id) selected @endif>{{ucwords($item->menu_kategori_nama)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Harga Menu</label>
                                <input type="number" placeholder="Rp. xxx" value="{{$detail->menu_harga}}" name="menu_harga" required class="form-control">
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
                                    <option value="Porsi" @if($detail->menu_satuan == "Porsi") selected @endif >Porsi</option>
                                    <option value="Unit" @if($detail->menu_satuan == "Unit") selected @endif >Unit</option>
                                    <option value="Kilo" @if($detail->menu_satuan == "Kilo") selected @endif >Kilo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-primary float-right mt-5">Simpan Menu</button>
                        </div>




                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection