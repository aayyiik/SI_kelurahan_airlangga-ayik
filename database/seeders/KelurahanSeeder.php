<?php

namespace Database\Seeders;

use App\Models\Kelurahan;
use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelurahan::create([
            'nama_kelurahan' => 'Kelurahan Airlangga',
            'alamat'=>'Gubeng Kertajaya IX C / 42 Surabaya'
        ]);
    }
}
