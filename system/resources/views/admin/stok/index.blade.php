@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <h3>Modal Awal</h3>
        <b>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</b>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <thead>
                <tr class="alert-primary">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Modal Awal</th>
                    <th>Laba/Rugi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($stok_awal as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->stok_tanggal}}</td>
                    <td>Rp. {{number_format($item->stok_modal_awal)}}</td>
                    <td class="text-danger">Rp. {{number_format($pendapatanHarian - $item->stok_modal_awal)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection