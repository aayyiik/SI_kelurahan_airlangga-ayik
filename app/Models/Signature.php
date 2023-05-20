<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;
    protected $table = 'signature';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_pegawai','id_jabatan'
    ];

    public function user() {
        return $this->belongsTo(User::class,'no_pegawai', 'nik_nip');
    }

    public function jabatans() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function aktivitas() {
        return $this->belongsTo(Aktivitas::class, 'id_aktivitas');
    }
   
}
