<!DOCTYPE html>
<html>
<head>
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
</head>
<body style='font-family: tahoma; font-size: 8pt;'>
    @php
		$totalHarga = 0;
		foreach($list_pesanan as $item) {
			$totalHarga += $item->menu_harga * $item->menu_qty;
		}
	@endphp
    <center>
        <table style='width: 350px; font-size: 16pt; font-family: calibri; border-collapse: collapse;' border='0'>
            <tr>
                <td width='70%' align='CENTER' vertical-align:top'>
                    <span style='color: black;'>
                        <b>RM. ALAS DAUN</b><br>
                        <p style="font-size: 11pt">Jl. KH.Mansyur, Tengah, Kec. Delta Pawan, Kabupaten Ketapang</p>
                    </span><br>
                    <span style='font-size: 12pt'>No. : xxxxx, {{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM YYYY') }} (user:{{Auth::user()->karyawan_nama}}), 11:57:50</span><br>
                </td>
            </tr>
        </table>
        <table cellspacing='0' cellpadding='0' style='width: 350px; font-size: 12pt; font-family: calibri; border-collapse: collapse;' border='0'>
            <tr align='center'>
                <td width='10%'>Item</td>
                <td width='13%'>Price</td>
                <td width='4%'>Qty</td>
                <td width='7%'>Diskon %</td>
                <td width='13%'>Total</td>
            </tr>
            <tr>
                <td colspan='5'><hr></td>
            </tr>
          
							

            @foreach($list_pesanan as $item)
            <tr style="margin-top: 20px">
                <td style='vertical-align:top'>{{ucwords($item->menu->menu_nama)}} </td>
                <td style='vertical-align:top; text-align:right; padding-right:10px'>{{number_format($item->menu_harga)}} </td>
                <td style='vertical-align:top; text-align:right; padding-right:10px'>{{$item->menu_qty}}</td>
                <td style='vertical-align:top; text-align:right; padding-right:10px'>0,00%</td>
                <td style='text-align:right; vertical-align:top'>{{number_format($item->menu_harga * $item->menu_qty)}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan='5'><hr></td>
            </tr>
            <tr>
                <td colspan='4'><div style='text-align:right'>Biaya Adm : </div></td>
                <td style='text-align:right; font-size:16pt;'>Rp0</td>
            </tr>
            <tr>
                <td colspan='4'><div style='text-align:right; color:black'>Total : </div></td>
                <td style='text-align:right; font-size:16pt; color:black'>Rp.{{number_format($totalHarga)}}</td>
            </tr>
        </table>
        <table style='width:350; font-size:12pt;' cellspacing='2'>
            <tr>
                <td align='center'>****** TERIMAKASIH ******</td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print()
</script>
</html>
