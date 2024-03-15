<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $daftarpaket = DaftarPaket::all();
        $paket = PaketWisata::all();
        return view(
            'homepage',
            compact('daftarpaket', 'paket')
        );
    }
    public function show($id)
    {
        $blog = PaketWisata::find($id);
        // $blog = DaftarPaket::all();
        // return view('daftarpaket', compact('blog'));



        $daftarpaket = DaftarPaket::with('fpaketwisata')->get();



        return view('daftarpaket', compact('blog', 'daftarpaket'));
    }

    public function blogs()
    {
        $daftarpaket = DaftarPaket::all();
        return view('blogs', compact('daftarpaket'));
    }
}
