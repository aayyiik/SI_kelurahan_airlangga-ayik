<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = [
        'no_admin',
        'kategori',
        'nama_kegiatan',
        'tanggal',
        'tempat',
        'deskripsi',
        'penyelenggara',
        'jenis_peserta',
        'kategori',
        'gambar'
    ];

    public function user() {
        return $this->belongsTo(User::class,'no_admin','nik_nip','nama');
    }


}
