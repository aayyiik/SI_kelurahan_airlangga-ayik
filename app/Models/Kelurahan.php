<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $table = 'kelurahan';
    protected $primaryKey = 'id_kelurahan';
    protected $fillable = [
        'nama_kelurahan','alamat'
    ];

    public function user() {
        return $this->hasMany(User::class, 'nik_nip');
    }
}
