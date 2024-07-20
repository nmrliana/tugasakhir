@extends('template.base-kasir')
@section('content')


<div class="card border-0">
    <div class="card-body">
        <h3>History Pesanan Anda</h3>
        <b>Hari Ini ({{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}) </b>

        <a href="{{url('kasir/beranda')}}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-home"></i>Mode Kasir</a>
        <div class="table-responsive">
            <table class="table table-bordered mt-3">
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
                @foreach($list_menu as $item)
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
            foreach($list_menu as $item) {
                $totalHarga += $item->menu_harga * $item->menu_qty;
            }
        @endphp

        <tr class="bg-secondary">
            <td colspan="5"><h4>Total Pendapatan</h4></td>
            <td colspan="1"><h4>Rp. {{number_format($totalHarga)}}</h4></td>
        </tr>
            </table>
        </div>
    </div>
</div>


@endsection