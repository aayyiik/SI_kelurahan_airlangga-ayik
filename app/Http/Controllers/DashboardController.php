<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        return view('dashboard.admin.home.home');
    }

    public function dashboardAdmin(){
        $pns = User::where('status','=','1')->get()->count();
        $non_pns = User::where('status','=','2')->get()->count();
        $berjalan = Kegiatan::where('tanggal','=','now')->get()->count();
        $internal = Kegiatan::where('kategori','=','1')->get()->count();
        $selesai = Kegiatan::where('tanggal','>','now')->get()->count();
        $eksternal = Kegiatan::where('kategori','=','2')->get()->count();

        

        $internal = Kegiatan::where('kategori','=','1')->orderBy('tanggal','desc')->get();
       
        $eksternal = Kegiatan::where('kategori','=','2')->orderBy('tanggal','desc')->get();

        return view('dashboard.admin.home.home',compact('pns','non_pns','internal','eksternal','berjalan','selesai'));
    }

    public function dashboardPegawaidanMasyarakat(){
        
        $internal = Kegiatan::where('kategori','=','1')->orderBy('tanggal','desc')->get();
       
        $eksternal = Kegiatan::where('kategori','=','2')->orderBy('tanggal','desc')->get();
        
        return view('dashboard.pegawai.home.home',compact('internal','eksternal'));
    }

}
