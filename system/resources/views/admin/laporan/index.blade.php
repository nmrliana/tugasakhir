@extends('template.base')
@section('content')

<style>
    .equal-height {
        height: 600px; /* Adjust the height as needed */
    }
</style>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
    <div class="btn-group btn-block mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-warning">Semua</button>
        <button type="button" class="btn btn-primary">Januari</button>
        <button type="button" class="btn btn-primary">Februari</button>
        <button type="button" class="btn btn-primary">Maret</button>
        <button type="button" class="btn btn-primary">April</button>
        <button type="button" class="btn btn-primary">Mei</button>
        <button type="button" class="btn btn-primary">Juni</button>
        <button type="button" class="btn btn-primary">Juli</button>
        <button type="button" class="btn btn-primary">Agustus</button>
        <button type="button" class="btn btn-primary">September</button>
        <button type="button" class="btn btn-primary">Oktober</button>
        <button type="button" class="btn btn-primary">November</button>
        <button type="button" class="btn btn-primary">Desember</button>
        <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Periode {{$tahun_link}}
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                @php
                $year = date('Y');
                @endphp
                <a class="dropdown-item @if($tahun_link == date('Y')) active @endif" href="{{url('admin/laporan',$year)}}">{{date('Y')}}</a>
                <a class="dropdown-item @if($tahun_link == $year-1) active @endif" href="{{url('admin/laporan',$year-1)}}">{{$year-1}}</a>
                <a class="dropdown-item @if($tahun_link == $year-2) active @endif" href="{{url('admin/laporan',$year-2)}}">{{$year-2}}</a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card equal-height">
            <div class="card-body">
                <center>
                    <h3> Pesanan Terbanyak Tahun Ini</h3>
                </center>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-lg-12 mt-3">
    <div class="card equal-height">
        <div class="card-body">
            <center>
                <h3> Pendapatan Tahun Ini</h3>
            </center>
            <canvas id="chartPendapatan"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const pendapatan = document.getElementById('chartPendapatan');
  const pieCtx = document.getElementById('myPieChart');

  const ctx = document.getElementById('myChart');
  const dataTerlaris = @json(array_values($data_terlaris));
  const revenueData = @json(array_values($revenue_data));

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Bln 1', 'Bln 2', 'Bln 3', 'Bln 4', 'Bln 5', 'Bln 6','Bln 7', 'Bln 8', 'Bln 9', 'Bln 10', 'Bln 11', 'Bln 12'],
      datasets: [{
        label: '#Pesanan Terbanyak Per Tahun',
        data: dataTerlaris,
        borderWidth: 1,
        backgroundColor: '#25695c',
        borderColor: '#25695c'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(pendapatan, {
    type: 'bar',
    data: {
      labels: ['Bln 1', 'Bln 2', 'Bln 3', 'Bln 4', 'Bln 5', 'Bln 6','Bln 7', 'Bln 8', 'Bln 9', 'Bln 10', 'Bln 11', 'Bln 12'],
      datasets: [{
        label: '#Pendapatan Per Tahun',
        data: revenueData,
        borderWidth: 1,
        backgroundColor: '#25695c',
        borderColor: '#25695c'
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  new Chart(pieCtx, {
    type: 'pie',
    data: {
      labels: [@foreach ($list_kategori as $item)
                "{{ Str::limit(ucwords($item->menu_nama), 20) }}",
              @endforeach],
      datasets: [{
        label: 'Product Distribution',
        data: [@foreach ($list_kategori as $item)
                "{{ Str::limit(ucwords($item->menu_nama), 20) }}",
              @endforeach],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    }
  });
</script>
@endsection
