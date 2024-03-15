<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use createPDF;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
            'pelanggan' => $pelanggan
        ]);
    }

    // public function createPDF()
    // {
    //     $data = user::all();
    //     view()->share('user', $data);
    //     $pdf = PDF::loadView('pdf_view', $data);
    //     return $pdf->download('pdf_file_pdf');
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'pelanggan.create',
            [
                'user' => User::all(),

            ]
        );
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
            'nama_lengkap',
            'no_hp',
            'alamat',
            'foto',
            'id_user',
        ]);
        $array = $request->only([
            'nama_lengkap',
            'no_hp',
            'alamat',
            'foto',
            'id_user',
        ]);
        $array['foto'] = $request->file('foto')->store('Foto Pelanggan');
        $tambah = Pelanggan::create($array);
        if ($tambah) $request->file('foto')->store('Foto Pelanggan');
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menambah Pelanggan Baru');
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
    { {
            //Menampilkan Form Edit
            $pelanggan = Pelanggan::find($id);
            if (!$pelanggan) return redirect()->route('pelanggan.index')
                ->with('error_message', 'pelanggan dengan id = ' . $id . ' tidak ditemukan');
            return view('pelanggan.edit', [
                'pelanggan' => $pelanggan,
                'user' => User::all()
            ]);
        }
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
        //Mengedit Data Pelanggan
        $request->validate([
            'pelanggan' =>
            'required|unique:pelanggan,pelanggan,' . $id
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_lengkap = $request->nama_lengkap;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->foto = $request->foto;
        $pelanggan->id_user = $request->id_user;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil mengubah Pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)

    //Menghapus pelanggan
    {

        $pelanggan = Pelanggan::find($id);
        if ($pelanggan) $pelanggan->delete();
        return redirect()->route('pelanggan.index')
            ->with('success_message', 'Berhasil menghapus Pelanggan');
    }
}
