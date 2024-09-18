@extends('template.base-kasir')
@section('content')
<div class="card border-0 mb-3">
    <div class="card-body">
        <h3>History Pesanan Anda</h3>
        <b>Hari Ini ({{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}) </b>

         <a href="{{url('kasir/beranda')}}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-home"></i>Mode Kasir</a>
    </div>
</div>

<div class="row">
    @foreach($list_pesanan as $pesanan)
    <div class="col-md-4 mb-3">
        <div class="card border-0">
            <div class="card-body">
                <b>Nama Pemesan : {{ucwords($pesanan->pesanan_nama)}}</b> <br>
                <b>Tanggal Pemesanan : {{ucwords($pesanan->created_at)}}</b> <br>

                <button class="btn btn-primary mt-3" type="button" data-toggle="collapse" data-target="#collapseExample{{$pesanan->pesanan_id}}" aria-expanded="false" aria-controls="collapseExample{{$pesanan->pesanan_id}}">
                    Detail Pesanan
                </button>

                <div class="collapse" id="collapseExample{{$pesanan->pesanan_id}}">
                    <table class="table table-sm table-bordered mt-3">
                        <thead>
                            <tr class="bg-secondary">
                                <th>No</th>
                                <th>Menu</th>
                                <th>Qty</th>
                                <th>Waktu Pesan</th>
                                <th>Total</th>
                                <th>Grand Total</th>
                            </tr>
                        </thead>
                        @foreach(App\Models\PesananMenu::where('pesanan_id',$pesanan->pesanan_id)->get() as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucwords($item->menu->menu_nama)}}</td>
                            <td>{{$item->menu_qty}}x</td>
                            <td>{{$item->created_at}}</td>
                            <td>Rp. {{number_format($item->menu_harga)}}</td>
                            <td>Rp. {{number_format($item->menu_harga * $item->menu_qty)}}</td>
                        </tr>
                        @endforeach

                        @php
                        $totalHarga = 0;
                        foreach(App\Models\PesananMenu::where('pesanan_id',$pesanan->pesanan_id)->get() as $item) {
                            $totalHarga += $item->menu_harga * $item->menu_qty;
                        }
                        @endphp

                        <tr class="bg-secondary">
                            <td colspan="4"><h6>Total Pendapatan</h6></td>
                            <td colspan="2"><h6>Rp. {{number_format($totalHarga)}}</h6></td>
                        </tr>
                    </table>

                    <b>Catatan Pesanan :</b> {{$pesanan->pesanan_catatan}}
                </div>
            </div>
        </div>
    </div>


    @endforeach
</div>


@endsection