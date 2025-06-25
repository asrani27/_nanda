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
    <h3 style="text-align: center">LAPORAN DATA KAMAR
    </h3>
    <br />
    <table width="100%" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nomor kamar</th>
            <th>tipe</th>
            <th>harga</th>
            <th>Perlengkapan</th>
            <th>Fasilitas</th>
            <th>status</th>
        </tr>
        @php
        $no =1;
        @endphp

        @foreach($data as $key => $item)
        <tr>
            <td>{{1 + $key}}</td>
            <td>{{$item->nomor}}</td>
            <td>{{$item->tipe}}</td>
            <td>{{number_format($item->harga)}}</td>
            <td>{{$item->perlengkapan == null ? '': $item->perlengkapan->nama}}</td>
            <td>{{$item->fasilitas == null ? '': $item->fasilitas->nama}}</td>
            <td>{{$item->status == 'Y' ? 'tersedia' :'terisi'}}</td>
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