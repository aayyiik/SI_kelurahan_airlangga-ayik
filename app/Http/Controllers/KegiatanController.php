<?php

namespace App\Http\Controllers;


use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    public function index(){
        $kegiatan = Kegiatan::orderBy('tanggal','desc')->get();
        $user = User::all();
        return view ('dashboard.admin.kegiatan.index',['kegiatan'=>$kegiatan], compact('user',));
    }

    public function create(Request $request){
        $request->validate([
            'nama_kegiatan' => 'required',
            'no_admin' => 'required',
            'nama_kegiatan'=> 'required',
            'penyelenggara'=> 'required',
            'jenis_peserta'=> 'required',
            'kategori'=> 'required',
            'tanggal'=> 'required',
            'tempat'=> 'required',
            'deskripsi'=>'required'

        ]);

        $kegiatan = new Kegiatan;
        $kegiatan->no_admin = Auth::user()->nik_nip;
        $kegiatan->nama_kegiatan = $request->input('nama_kegiatan');
        $kegiatan->penyelenggara = $request->input('penyelenggara');
        $kegiatan->jenis_peserta = $request->input('jenis_peserta');
        $kegiatan->kategori = $request->input('kategori');
        $kegiatan->tempat = $request->input('tempat');
        $kegiatan->tanggal = $request->input('tanggal');
        $kegiatan->deskripsi = $request->input('deskripsi');
        $kegiatan->save();

        return redirect ('/daftar_kegiatan')->with('sukses','Data Berhasil Diinput');
       
        // return redirect('/daftar_kegiatan');

    }

    public function edit ($id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $user = User::all();
        return view('dashboard.admin.kegiatan.edit',['kegiatan' => $kegiatan], compact('user'));
    }

    public function update (Request $request,$id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->update($request->all());
        return redirect('/daftar_kegiatan')->with('update','Data Berhasil diperbarui');
    }

    public function delete ($id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->delete($kegiatan);
        return redirect('/daftar_kegiatan')->with('hapus','Data Berhasil dihapus');
    }
}
