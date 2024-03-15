<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-toke" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Cetak Reservasi</title>

</head>

<body>
    <div class="container text-center form-group">
        <p class="text-center"><b>Reservasi Report</b></p>
        <table class="table border table-bordered
    table-stripped" id="example2">
            <thead>
                <tr class="border border-black">
                    <th>No.</th>
                    <th>Id Pelanggan</th>
                    <th>Id Paket</th>
                    <th>Tanggal</th>
                    <th>Jumlah Peserta</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Nilai Diskon</th>
                    <th>Total</th>
                    <th>Bukti</th>
                    <th>Status</th>


                </tr>
            </thead>
            <tbody class="border border-black">

                @foreach($reservasi as $key => $reservasi)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$reservasi->id_pelanggan}}</td>
                    <td>{{$reservasi->id_daftar_paket}}</td>
                    <td>{{$reservasi->tgl_reservasi_wisata}}</td>
                    <td>{{$reservasi->harga}}</td>
                    <td>{{$reservasi->jumlah_peserta}}</td>
                    <td>{{$reservasi->diskon}}</td>
                    <td>{{$reservasi->nilai_diskon}}</td>
                    <td>{{$reservasi->total_bayar}}</td>
                    <td><img src="storage/app/public/foto transfer{{$reservasi->foto}}" alt="{{$reservasi->foto}} tidak tampil" class="img-thumbnail"></td>
                    <td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <script type="text/javascript">
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>