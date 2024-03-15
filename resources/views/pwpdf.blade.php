<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Title : {{ $title }}</h1>
    <p>Date: {{ $date }}</p>
    <table>
        @foreach ($daftarpakets as $daftarpaket)
        <tr>
            <td>{{$daftarpaket['nama_paket']}}</td>
            <td>{{$daftarpaket['id_paket_wisata']}}</td>
            <td>{{$daftarpaket['jumlah_peserta']}}</td>
            <td>{{$daftarpaket['harga_paket']}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>