<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nik_nip'=>'196601021991031013',
                'id_jabatan'=> '1',
                'id_kelurahan'=> '1',
                'nama'=>'Sugeng Harijono, SH, MH',
                'jenis_kelamin' => '1',
                'alamat'=>'Jl. dharmawangsa No 09',
                'status' => '1',
                'password'=> bcrypt('196601021991031013'),

            ],
            [
                'nik_nip'=>'196901232009012001',
                'id_jabatan'=> '2',
                'id_kelurahan'=> '1',
                'nama'=>'Dinar Prabandari, S.Sos',
                'jenis_kelamin'=>'1',
                'alamat'=>'Jl. dharmawangsa No 08',
                'status'=>'1',
                'password'=> bcrypt('196901232009012001'),
                
            ],
            [
                'nik_nip'=>'3578276501020001',
                'id_jabatan'=> '14',
                'id_kelurahan'=> '1',
                'nama'=>'Ari Syadzilliyah Syaihu Febryansyah',
                'jenis_kelamin'=>'1',
                'alamat'=>'Jl. dharmawangsa No 04',
                'status'=>'2',
                'password'=> bcrypt('3578276501020001'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    
    }
}
