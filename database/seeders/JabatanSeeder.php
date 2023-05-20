<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama_jabatan' => 'Kepala Lurah Penata Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Sekretaris Penata Tingkat I Lurah'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Lurah'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Kasi Pemerintahan Penata Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Kasi Pemerintahan Penata Muda Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Kasi Ketentraman, Ketertiban Umum dan Pembangunan Penata Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Kasi Ketentraman, Ketertiban Umum dan Pembangunan Pengatur Tingkat Muda I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Kasi Ketentraman, Ketertiban Umum dan Pembangunan Juru Tingkat Muda I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Petugas Keamanan'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Petugas Kebersihan'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Kasi Kesejahteraan Rakyat dan Perekonomian Penata Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Kasi Kesejahteraan Rakyat dan Perekonomian Penata Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff Kasi Kesejahteraan Rakyat dan Perekonomian Pengatur Tingkat I'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Admin'
        ]);

        
    }
}
