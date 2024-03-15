<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFormatRupiah;

class PaketWisata extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'paket_wisata';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'itinerary',
        'harga_paket',
        'diskon',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];
    public function fdaftarpaket()
    {
        return $this->hasMany(DaftarPaket::class, 'id', 'id_paket_wisata');
    }
}
