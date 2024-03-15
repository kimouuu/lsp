<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi'; //<- ini samain yg di migrations = Schema::create('reservasi', function (Blueprint $table) {
    protected $fillable = [
        'id_pelanggan',
        'id_daftar_paket',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
    ];
    public function fpelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id');
    }
    public function fdaftarpaket()
    {
        return $this->belongsTo(DaftarPaket::class,  'id_daftar_paket', 'id');
    }
}
