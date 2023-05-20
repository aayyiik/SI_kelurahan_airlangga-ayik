<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    use HasFactory;

    protected $table = 'aktivitas';
    protected $primaryKey = 'id_aktivitas';

    protected $fillable = [
        'no_pegawai',
        'nama_aktivitas',
        'tanggal',
        'foto'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'no_pegawai','nik_nip');
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function signature() {
        return $this->hasMany(Signature::class,'id','no_pegawai','nama','id_jabatan','nama_jabatan');
    }

   


}
