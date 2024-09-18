<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faktur Pembayaran</title>
    <style>
        #tabel {
            font-size: 15px;
            border-collapse: collapse;
        }

        #tabel td {
            padding-left: 5px;
            border: 1px solid black;
        }

        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
        }
    </style>
    <style>
        body {
            font-family: Tahoma;
            font-size: 8pt;
        }

        #receipt {
            width: 350px;
            font-size: 16pt;
            font-family: Calibri;
            margin: 0 auto;
            text-align: center;
        }

        #header,
        #footer {
            text-align: center;
        }

        #header p {
            font-size: 11pt;
            margin: 0;
        }

        table {
            width: 100%;
            font-size: 12pt;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: right;
        }

        th {
            text-align: left;
        }

        hr {
            border: 0;
            border-top: 1px solid black;
            margin: 5px 0;
        }
    </style>
</head>

<body style='font-family: tahoma; font-size: 8pt;'>
    @php
    $totalHarga = 0;
    foreach($list_pesanan as $item) {
    $totalHarga += $item->menu_harga * $item->menu_qty;
    }
    @endphp
    <center>
        <div id="receipt">
            <div id="header">
                <b>RM. ALAS DAUN</b><br>
                <p>Jl. KH.Mansyur, Tengah, Kec. Delta Pawan, Kabupaten Ketapang</p>
                <span style='font-size: 12pt'>
                    No. : {{$pesanan->pesanan_id}} / {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }} (user:{{ Auth::user()->karyawan_nama }}), 11:57:50
                </span>
            </div>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list_pesanan as $item)
                    <tr>
                        <td style="text-align: left;">{{ ucwords($item->menu->menu_nama) }}</td>
                        <td>{{ number_format($item->menu_harga) }}</td>
                        <td>{{ $item->menu_qty }}</td>
                        <td>{{ number_format($item->menu_harga * $item->menu_qty) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <table>
                <tr>
                    <td style="text-align: left;">Biaya Admin :</td>
                    <td>Rp0</td>
                </tr>
                <tr>
                    <td style="text-align: left; color: black;">Total :</td>
                    <td style="color: black;">Rp{{ number_format($totalHarga) }}</td>
                </tr>
            </table>
            <div id="footer">
                <span>****** TERIMAKASIH ******</span>
            </div>
        </div>
    </center>
</body>

</html>