<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>

    <table width="100%">
        <tr>
            <td width="15%">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('logo/logoros.jpeg'))) }}"
                    width="300px">
            </td>
            <td style="text-align: center;" width="60%">

                <font size="20px"><b>Penginapan Mba Ros<br />
                    </b></font>
                Jalan Angkasa, Gang 01 Nomor 11, Landasan ulin, Syamsudin Noor, Banjarbaru
            </td>

        </tr>
    </table>
    <hr>
    <h3 style="text-align: center">LAPORAN DATA HASIL
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No Reservasi</th>
            <th>tipe kamar</th>
            <th>check in</th>
            <th>check out</th>
            <th>lama</th>
            <th>harga</th>
            <th>total</th>
            <th>status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach($data as $index => $item)
        <tr>
            <td>REV.{{$item->id}}</td>
            <td>{{$item->kamar == null ? null : $item->kamar->tipe}}</td>
            <td>{{\carbon\carbon::parse($item->check_in)->format('d M Y')}}</td>
            <td>{{\carbon\carbon::parse($item->check_out)->format('d M Y')}}</td>
            <td>{{$item->lama}}</td>
            <td>{{number_format($item->harga)}}</td>
            <td>{{number_format($item->harga * $item->lama)}}</td>
            <td>{{$item->status}}</td>
        </tr>
        @endforeach
    </table>

    <table width="100%">
        <tr>
            <td width="60%"></td>
            <td></td>
            <td><br />Banjarbaru, {{\Carbon\Carbon::now()->translatedFormat('d F Y')}}<br />
                Admin<br /><br /><br /><br />

                <u></u><br />
                (.....................)
            </td>
        </tr>
    </table>
</body>

</html>