<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    protected $table = 'daftar_paket'; //<- ini samain yg di migrations = Schema::create('daftar_paket', function (Blueprint $table) {
    protected $fillable = [
        'nama_paket',
        'id_paket_wisata',
        'jumlah_peserta',
        'harga_paket',
    ];

    // public function fpaketwisata()
    // {
    //     return $this->belongsTo(PaketWisata::class, 'id');
    // }
}
