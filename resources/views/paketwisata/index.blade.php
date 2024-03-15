@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
<h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('paketwisata.create')}}" class="btn btn-primary mb-2">
                    Tambah
                </a>
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama Paket</th>
                            <th>Deskripsi</th>
                            <th>Fasilitas</th>
                            <th>Itinerary</th>
                            <th>Diskon</th>
                            <th>Foto 1</th>
                            <th>Foto 2</th>
                            <th>Foto 3</th>
                            <th>Foto 4</th>
                            <th>Foto 5</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paketwisata as $key => $paketwisata)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$paketwisata->nama_paket}}</td>
                            <td>{{$paketwisata->deskripsi}}</td>
                            <td>{{$paketwisata->fasilitas}}</td>
                            <td>{{$paketwisata->itinerary}}</td>
                            <td>{{$paketwisata->diskon}}</td>
                            <td><img src="storage/{{$paketwisata->foto1}}" alt="{{$paketwisata->foto1}} tidak tampil" class="img-thumbnail"></td>
                            <td><img src="storage/{{$paketwisata->foto2}}" alt="{{$paketwisata->foto2}} tidak tampil" class="img-thumbnail"></td>
                            <td><img src="storage/{{$paketwisata->foto3}}" alt="{{$paketwisata->foto3}} tidak tampil" class="img-thumbnail"></td>
                            <td><img src="storage/{{$paketwisata->foto4}}" alt="{{$paketwisata->foto4}} tidak tampil" class="img-thumbnail"></td>
                            <td><img src="storage/{{$paketwisata->foto5}}" alt="{{$paketwisata->foto5}} tidak tampil" class="img-thumbnail"></td>
                            <td>

                                <a href="{{route('paketwisata.edit', $paketwisata)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('paketwisata.destroy', $paketwisata)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush