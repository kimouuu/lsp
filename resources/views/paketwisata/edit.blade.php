@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paketwisata.update', $paketwisata)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" class="form-control
                        @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Nama Paket" name="nama_paket" value="{{$paketwisata->nama_paket ?? old('nama_paket')}}">
                        @error('nama_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control
                        @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Deskripsi" name="deskripsi" value="{{$paketwisata->deskripsi ?? old('deskripsi')}}">
                        @error('deskripsi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <input type="text" class="form-control
                        @error('fasilitas') is-invalid @enderror" id="fasilitas" placeholder="Fasilitas" name="fasilitas" value="{{$paketwisata->fasilitas ?? old('fasilitas')}}">
                        @error('fasilitas') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="itinerary">Itinerary</label>
                        <input type="text" class="form-control
                        @error('itinerary') is-invalid @enderror" id="itinerary" placeholder="Itinerary" name="itinerary" value="{{$paketwisata->itinerary ?? old('itinerary')}}">
                        @error('itinerary') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="text" class="form-control
                        @error('diskon') is-invalid @enderror" id="diskon" placeholder="Diskon" name="diskon" value="{{$paketwisata->diskon ?? old('diskon')}}">
                        @error('diskon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto1">Foto 1</label>
                        <input type="file" class="form-control
@error('foto1') is-invalid @enderror" id="foto1" placeholder="Foto 1" name="foto1" value="{{$foto1->foto1 ?? old('foto1')}}">
                        @error('foto1') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto2">Foto 2</label>
                        <input type="file" class="form-control
@error('foto2') is-invalid @enderror" id="foto2" placeholder="Foto 2" name="foto2" value="{{$foto2->foto2 ?? old('foto2')}}">
                        @error('foto2') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto3">Foto 3</label>
                        <input type="file" class="form-control
@error('foto3') is-invalid @enderror" id="foto3" placeholder="Foto 3" name="foto3" value="{{$foto3->foto3 ?? old('foto3')}}">
                        @error('foto3') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto4">Foto 4</label>
                        <input type="file" class="form-control
@error('foto4') is-invalid @enderror" id="foto4" placeholder="Foto 4" name="foto4" value="{{$foto4->foto4 ?? old('foto4')}}">
                        @error('foto4') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto5">Foto 5</label>
                        <input type="file" class="form-control
@error('foto5') is-invalid @enderror" id="foto5" placeholder="Foto 5" name="foto5" value="{{$foto5->foto5 ?? old('foto5')}}">
                        @error('foto5') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('paketwisata.index')}}" class="btn
                        btn-danger">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
    @push('js')
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil1').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto1").change(function() {
            readURL1(this);
        });

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil2').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto2").change(function() {
            readURL2(this);
        });

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil3').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto3").change(function() {
            readURL3(this);
        });


        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil4').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto4").change(function() {
            readURL4(this);
        });



        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tampil5').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#foto5").change(function() {
            readURL5(this);
        });
    </script>
    @endpush