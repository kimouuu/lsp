<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan'; //<- ini samain yg di migrations = Schema::create('pelanggan', function (Blueprint $table) {
    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat',
        'foto',
        'id_user',
    ];
    public function fuser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
