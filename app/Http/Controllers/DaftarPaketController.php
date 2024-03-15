<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarpaket = DaftarPaket::all();
        return view('daftarpaket.index', [
            'daftarpaket' => $daftarpaket
        ]);
    }
    // $daftarpaket : ambil dari adminlte
    // DaftarPaket : nama models
    // daftarpaket.index : bikin daftarpaket/index.blade.php
    // 'daftarpaket' : dari web.php/routes

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Tambah Daftar Paket
        return view('daftarpaket.create', [
            'paketwisata' => PaketWisata::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Daftar Paket
        $request->validate([
            'nama_paket',
            'id_paket_wisata',
            'jumlah_peserta',
            'harga_paket',
        ]);
        $array = $request->only([
            'nama_paket',
            'id_paket_wisata',
            'jumlah_peserta',
            'harga_paket',
        ]);
        $daftarpaket = DaftarPaket::create($array);
        return redirect()->route('daftarpaket.index')
            ->with('success_message', 'Berhasil menambah Daftar paket baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Menampilkan Form Edit
        $daftarpaket = DaftarPaket::find($id);
        if (!$daftarpaket) return redirect()->route('daftarpaket.index')
            ->with('error_message', 'daftarpaket dengan id = ' . $id . ' tidak ditemukan');
        return view('daftarpaket.edit', [
            'daftarpaket' => $daftarpaket,
            'paketwisata' => PaketWisata::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Mengedit Data Daftar Paket
        $request->validate([
            'daftarpaket' => 'required|unique:daftarpaket,daftarpaket,' . $id
        ]);
        $daftarpaket = Daftarpaket::find($id);
        $daftarpaket->nama_paket = $request->nama_paket;
        $daftarpaket->id_paket_wisata = $request->id_paket_wisata;
        $daftarpaket->jumlah_peserta = $request->jumlah_peserta;
        $daftarpaket->harga_paket = $request->harga_paket;
        $daftarpaket->save();
        return redirect()->route('daftarpaket.index')
            ->with('success_message', 'Berhasil mengubah Daftar Paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus Daftar Paket
        $daftarpaket = DaftarPaket::find($id);
        if ($daftarpaket) $daftarpaket->delete();
        return redirect()->route('daftarpaket.index')
            ->with('success_message', 'Berhasil menghapus Daftar Paket');
    }
}
