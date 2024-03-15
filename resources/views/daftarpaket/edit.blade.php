@extends('adminlte::page')
@section('title', 'Edit Daftar Paket')
@section('content_header')
<h1 class="m-0 text-dark">Edit Daftar Paket</h1>
@stop
@section('content')
<form action="{{route('daftarpaket.update', $daftarpaket)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket" value="{{$daftarpaket->nama_paket ?? old('nama_paket')}}">
                        @error('nama_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="paketwisata">Paket Wisata</label>
                        <div class="input-group">
                            <input type="text" name="id_paket_wisata" id="id_paket_wisata" value="{{$daftarpaket->fpaketwisata->id_paket_wisata ?? old ('id_paket_wisata')}}">
                            <input type="hidden" class="form-control @error('paketwisata') is-invalid @enderror" placeholder="Paket Wisata" id="paketwisata" name="paketwisata" value="{{$daftarpaket->fpaketwisata->paketwisata ?? old ('paketwisata')}}" arialabel="Paket Wisata" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i> Cari Data Paket Wisata</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_peserta">Jumlah Peserta</label>
                        <input type="text" class="form-control
@error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" placeholder="Jumlah Peserta" name="jumlah_peserta" value="{{$daftarpaket->jumlah_peserta ?? old('jumlah_peserta')}}">
                        @error('jumlah_peserta') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga_paket">Harga Paket</label>
                        <input type="text" class="form-control
@error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Harga Paket" name="harga_paket" value="{{$daftarpaket->harga_paket ?? old('harga_paket')}}">
                        @error('harga_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('daftarpaket.index')}}" class="btn btn-danger">
            Batal
        </a>
    </div>
    <!-- Modal -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Paket Wisata</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered tablestripped" id="example2">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>nama Paket</th>
                                <th>Deskripsi</th>
                                <th>Fasilitas</th>
                                <th>Itinerary</th>
                                <th>Diskon</th>
                                <!-- <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th> -->
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paketwisata as $key => $paketwisata)
                            <tr>
                                <!-- <td>{{$key+1}}</td> -->
                                <td>{{$paketwisata->nama_paket}}</td>
                                <td>{{$paketwisata->deskripsi}}</td>
                                <td>{{$paketwisata->fasilitas}}</td>
                                <td>{{$paketwisata->itinerary}}</td>
                                <td>{{$paketwisata->diskon}}</td>
                                <!-- <img src="storage/{{$paketwisata->foto1}}" alt="{{$paketwisata->foto1}} tidak tampil" class="img-thumbnail">
                            <img src="storage/{{$paketwisata->foto2}}" alt="{{$paketwisata->foto2}} tidak tampil" class="img-thumbnail">
                            <img src="storage/{{$paketwisata->foto3}}" alt="{{$paketwisata->foto3}} tidak tampil" class="img-thumbnail">
                            <img src="storage/{{$paketwisata->foto4}}" alt="{{$paketwisata->foto4}} tidak tampil" class="img-thumbnail">
                            <img src="storage/{{$paketwisata->foto5}}" alt="{{$paketwisata->foto5}} tidak tampil" class="img-thumbnail"> -->
                                <td>
                                    <button type="button" class="btn btn-primary
                            btn-xs" onclick="pilih('{{$paketwisata->id}}','{{$paketwisata->nama_paket}}')" data-bs-dismiss="modal">
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
    @stop
    @push('js')
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function pilih(id, dp) {
            document.getElementById('id_paket_wisata').value = id
            document.getElementById('paketwisata').value = dp
        }
    </script>
    @endpush