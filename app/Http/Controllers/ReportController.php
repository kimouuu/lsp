<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DaftarPaket;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
        $users = User::all();

        $data = [
            'title' => "Laporan",
            'date' => date('Y-m-d H:i:s'),
            'users' => $users
        ];

        $pdf = PDF::loadview('testpdf', $data);
        return $pdf->download('report.pdf');
    }

    public function cetak()
    {
        $reservasi = Reservasi::all();
        $data = [
            "title" => "Laporan Reservasi",
            'date' => date('Y-m-d H:i:s'),
            'reservasi' => $reservasi
        ];
        $pdf = PDF::loadview("cetak", $data);
        return $pdf->download('cetak.pdf');
    }
}
