<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan'; //<- ini samain yg di migrations = Schema::create('karyawan', function (Blueprint $table) {
    protected $fillable = [
        'nama_karyawan',
        'alamat',
        'no_hp',
        'jabatan',
        'id_user',
    ];
    public function fuser()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
