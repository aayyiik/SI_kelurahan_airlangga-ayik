<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'users';
     protected $primaryKey = 'nik_nip';
    protected $fillable = [
        'nik_nip',
        'id_jabatan',
        'id_kelurahan',
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telp',
        'email', 
        'status',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jabatan() {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function kelurahan() {
        return $this->belongsTo(Kelurahan::class, 'id_kelurahan');
    }
    

    public function aktivitas() {
        return $this->hasMany(Aktivitas::class,'id_aktivitas','nik_nip');
    }

    public function kegiatan() {
        return $this->hasMany(Kegiatan::class,'id_kegiatan','no_admin');
    }

  
}
