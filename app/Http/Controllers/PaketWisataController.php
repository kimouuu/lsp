<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paketwisata = PaketWisata::all();
        $daftarpaket = DaftarPaket::all();
        return view('paketwisata.index', [
            'paketwisata' => $paketwisata,
            'harga_paket' => DaftarPaket::all('harga_paket')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paketwisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' => 'required|image|file|max:2048',
            'foto3' => 'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048',
        ]);
        $array = $request->only([
            'nama_paket',
            'deskripsi',
            'fasilitas',
            'itinerary',
            'diskon',
            'foto1',
            'foto2',
            'foto3',
            'foto4',
            'foto5',
        ]);

        $array['foto1'] = $request->file('foto1')->store('Foto Wisata');
        $array['foto2'] = $request->file('foto2')->store('Foto Wisata');
        $array['foto3'] = $request->file('foto3')->store('Foto Wisata');
        $array['foto4'] = $request->file('foto4')->store('Foto Wisata');
        $array['foto5'] = $request->file('foto5')->store('Foto Wisata');

        $tambah = PaketWisata::create($array);
        // if($tambah) $request->file('foto1')->store('Foto Transfer');
        return redirect()->route('paketwisata.index')
            ->with('success_message', 'Berhasil menambah Paket Wisata baru');
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
        //Menampilkan Form Edit Paket wisata
        $paketwisata = PaketWisata::find($id);
        if (!$paketwisata) return redirect()->route('paketwisata.index')
            ->with('error_message', 'paketwisata dengan id = ' . $id . ' tidak ditemukan');
        return view('paketwisata.edit', [
            'paketwisata' => $paketwisata
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
        $fields = ['name_paket', 'deskripsi', 'fasilitas', 'itinerary', 'diskon', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5'];
        // $request->validate([
        //     'paketwisata' => 'required|unique:paketwisata,paketwisata,' . $id
        // ]);
        $paketwisata = PaketWisata::find($id);
        foreach ($fields as $f) {
            if (isset($request[$f]) && !empty($request[$f])) {
                $paketwisata[$f] = $request[$f];
            }
        }
        // $paketwisata->nama_paket = $request->nama_paket;
        // $paketwisata->deskripsi = $request->deskripsi;
        // $paketwisata->fasilitas = $request->fasilitas;
        // $paketwisata->itinerary = $request->itinerary;
        // $paketwisata->diskon = $request->diskon;
        // $paketwisata->foto1 = $request->foto1;
        // $paketwisata->foto2 = $request->foto2;
        // $paketwisata->foto3 = $request->foto3;
        // $paketwisata->foto4 = $request->foto4;
        // $paketwisata->foto5 = $request->foto5;
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paketwisata = PaketWisata::findOrFail($id);
        $nama_paket_wisata = $paketwisata->name;
        $paketwisata->delete();
        // if ($paketwisata) {
        //     $hapus = $paketwisata->delete();
        //     if ($hapus) unlink("storage/" . $paketwisata->foto1);
        // }
        // return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata "' .
        //     $paketwisata->name . '" !');

        // $paketwisata = PaketWisata::find($id);
        // if ($paketwisata) {
        //     $hapus = $paketwisata->delete();
        //     if ($hapus) unlink("storage/" . $paketwisata->foto2);
        // }
        // return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata "' .
        //     $paketwisata->name . '" !');

        // $paketwisata = PaketWisata::find($id);
        // if ($paketwisata) {
        //     $hapus = $paketwisata->delete();
        //     if ($hapus) unlink("storage/" . $paketwisata->foto3);
        // }
        // return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata "' .
        //     $paketwisata->name . '" !');

        // $paketwisata = PaketWisata::find($id);
        // if ($paketwisata) {
        //     $hapus = $paketwisata->delete();
        //     if ($hapus) unlink("storage/" . $paketwisata->foto4);
        // }
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata "' .
            $nama_paket_wisata . '" !');
    }
}
