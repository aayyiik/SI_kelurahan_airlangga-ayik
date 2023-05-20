<?php

namespace Database\Seeders;

use App\Models\Signature;
use Illuminate\Database\Seeder;

class SignatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Signature::create([
            'no_pegawai' => '196601021991031013',
            'id_jabatan' => '1'
        ]);

        Signature::create([
            'no_pegawai' => '196901232009012001',
            'id_jabatan' => '2'
        ]);
            
    }
}
