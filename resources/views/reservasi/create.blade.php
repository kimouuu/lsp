@extends('adminlte::page')
@section('title', 'Tambah Reservasi')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Reservasi</h1>
@stop
@section('content')
<form action="{{route('reservasi.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="idpelanggan">Id Pelanggan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="{{old('id_pelanggan')}}">
                            <input type="text" class="form-control
                    @error('idpelanggan') is-invalid @enderror" placeholder="Id Pelanggan" id="idpelanggan" name="idpelanggan" value="{{old('idpelanggan')}}" arialabel="Id Pelanggan" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>Cari Data Id Pelanggan</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="daftarpaket">Daftar Paket</label>
                        <div class="input-group">
                            <input type="hidden" name="id_daftar_paket" id="id_daftar_paket" value="{{old('id_daftar_paket')}}">
                            <input type="text" class="form-control
                    @error('daftarpaket') is-invalid @enderror" placeholder="Daftar Paket" id="daftarpaket" name="daftarpaket" value="{{old('daftarpaket')}}" arialabel="Daftar Paket" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop1"></i>
                                Cari Data Daftar Paket</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tgl_reservasi_wisata">Tanggal Reservasi Wisata</label>
                        <input type="date" class="form-control
                        @error('tgl_reservasi_wisata') is-invalid @enderror" id="tgl_reservasi_wisata" placeholder="Tanggal Reservasi Wisata" name="tgl_reservasi_wisata" value="{{old('tgl_reservasi_wisata')}}">
                        @error('tgl_reservasi_wisata') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control
                        @error('harga') is-invalid @enderror" id="harga" placeholder="Harga" name="harga" value="{{old('harga')}}">
                        @error('harga') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="number" class="form-control
                        @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Jumlah Peserta" name="jumlah_peserta" value="{{old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" step="0.01" class="form-control
                        @error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon" value="{{old('diskon')}}">
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nilai_diskon">Nilai Diskon</label>
                        <input type="number" class="form-control
                        @error('nilai_diskon') is-invalid @enderror" id="nilai_diskon" placeholder="Nilai Diskon" name="nilai_diskon" value="{{old('nilai_diskon')}}">
                        @error('nilai_diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <button id="turu" class="btn btn-primary">Submit diskon</button>
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Total Bayar</label>
                        <input type="number" class="form-control
                        @error('total_bayar') is-invalid @enderror" id="total_bayar" placeholder="Total Bayar" name="total_bayar" value="{{old('total_bayar')}}">
                        @error('total_bayar') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_reservasi_wisata">Status Reservasi Wisata</label>
                        <select class="form-select @error('status_reservasi_wisata') isinvalid @enderror" id="status_reservasi_wisata" name="status_reservasi_wisata">
                            <option value="pesan" @if(old('status_reservasi_wisata')=='pesan' )selected @endif>Pesan
                            </option>
                            <option value="dibayar" @if(old('status_reservasi_wisata')=='dibayar' )selected @endif>
                                Dibayar</option>
                            <option value="selesai" @if(old('status_reservasi_wisata')=='selesai' )selected @endif>
                                Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file_bukti_tf" class="formlabel">Bukti Transfer</label>
                        <img src="/img/gallery.png" class="imgthumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                        <input class="form-control @error('file_bukti_tf') isinvalid @enderror" type="file" id="file_bukti_tf" name="file_bukti_tf">
                        @error('file_bukti_tf') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Pelanggan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example2">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>No. Hp</th>
                                    <th>Alamat</th>
                                    <th>Foto</th>
                                    <th>ID User</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelanggan as $key => $pln)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$pln->nama_lengkap}}</td>
                                    <td>{{$pln->no_hp}}</td>
                                    <td>{{$pln->alamat}}</td>
                                    <td>{{$pln->foto}}</td>
                                    <td>{{$pln->id_user}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$pln->id}}', '{{$pln->nama_lengkap}}', '{{$pln->no_hp}}', '{{$pln->alamat}}', 
                        '{{$pln->foto}}', '{{$pln->id_user}}')" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel1">Pencarian Data Daftar Paket</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-hover table-bordered tablestripped" id="example3">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Paket</th>
                                    <th>Id Paket Wisata</th>
                                    <th>Jumlah Peserta</th>
                                    <th>Harga Paket</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftarpaket as $key => $dp)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dp->id}}</td>
                                    <td>{{$dp->nama_paket}}</td>
                                    <td>{{$dp->id_paket_wisata}}</td>
                                    <td>{{$dp->jumlah_peserta}}</td>
                                    <td>{{$dp->harga_paket}}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary
                            btn-xs" onclick="pilih1('{{$dp->id}}','{{$dp->nama_paket}}','{{$dp->id_paket_wisata}}',
                             '{{$dp->jumlah_peserta}}' , '{{$dp->harga_paket}}')" data-bs-dismiss="modal">
                                            Pilih
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('reservasi.index')}}" class="btn btn-default">Batal</a>
    </div>
    <!--End Modal -->

    @stop
    <!-- @push('js')
    <script>
        function diskon() {
            let harga = document.getElementById('harga').value;
            let diskon = document.getElementById('diskon').value;
            let jumlah = document.getElementById('jumlah_peserta').value;
            let nilai_diskon = (harga) = diskon / 100
            let nilaiDiskon = document.getElementById('nilai_diskon').value = nilai_diskon;
            let total_bayar = document.getElementById('total_bayar');
            total_bayar.value = (harga - nilai_diskon) * jumlah;
        }
        const discount = document.getElementById("diskon");
        const harga = document.getElementById("harga");
        const nilai_diskon = document.getElementById("nilai_diskon");
        const total_bayar = document.getElementById("total_bayar");

        discount.addEventListener("change", function() {
            let diskon = discount.value;
            let total = harga.value - diskon;
            nilai_diskon.value = diskon;
            total_bayar.value = total;
        });

        harga.addEventListener("change", function() {
            let diskon = discount.value;
            let total = harga.value - diskon;
            nilai_diskon.value = diskon;
            total_bayar.value = total;
        });
        $('#example2').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih(id, pelanggan) {
            document.getElementById('id_pelanggan').value = id
            document.getElementById('idpelanggan').value = pelanggan
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto").change(function() {
            readURL(this);
        });

        $('#example3').DataTable({
            "responsive": true,
        });
        //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
        function pilih1(id, dp) {
            document.getElementById('id_daftar_paket').value = id
            document.getElementById('daftarpaket').value = dp
        }

        const turu = document.getElementById("turu").addEventListener("click", function(e) {
            e.preventDefault();
            let harga = document.getElementById("harga").value;
            let diskon = document.getElementById("diskon").value;
            let jumlah = document.getElementById("jumlah_peserta").value;
            let nilai_diskon = harga * jumlah * diskon / 100
            let total_bayar = document.getElementById("total_bayar");
            total_bayar.value = nilai_diskon;

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto").change(function() {
            readURL(this);
        });
    </script> -->
    <!-- @endpush -->
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });


        function pilih(id_pelanggan, pelanggan) {
            document.getElementById('id_pelanggan').value = id_pelanggan
            document.getElementById('pelanggan').value = pelanggan
        }

        function pilih1(id_daftar_paket, daftar_paket) {
            document.getElementById('id_daftar_paket').value = id_daftar_paket
            document.getElementById('daftar_paket').value = daftar_paket
        }
    </script>
    <script>
        function hargadisk() {
            var harga = document.getElementById('harga').value;
            var diskon = document.getElementById('diskon').value;
            // var peserta = document.getElementById('jumlah_peserta').value;

            diskon_decimal = diskon / 100;
            perhitungan_diskon = harga * diskon_decimal;
            harga_dis = harga - perhitungan_diskon;
            total = harga - perhitungan_diskon;
            document.getElementById('total_bayar').value = total;
            document.getElementById('nilai_diskon').value = perhitungan_diskon;
        }
    </script>
    @endpush