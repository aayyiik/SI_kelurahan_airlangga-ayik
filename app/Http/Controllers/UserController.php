<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Kelurahan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserController extends Controller
{
    public function index(){
        $user = User::orderBy('created_at','asc')->get();
        $jabatan = Jabatan::all();
        $kelurahan = Kelurahan::all();
        return view('dashboard.admin.user.index',['user'=>$user], compact('jabatan','kelurahan'));
    }

    public function create( Request $request ){
        // $request->validate([
        //     'nik_nip' => 'required|unique:users,nik_nip',
        //     'nama' => 'required',
        //     'id_jabatan'=> 'required',
        //     'id_kelurahan'=> 'required',
        //     'jenis_kelamin'=> 'required',
        //     'alamat'=> 'required',
        //     'no_telp'=> 'required',
        //     'status'=> 'required'

        // ]);
       
        $pegawai = new User;
        $pegawai->nik_nip = $request['nik_nip'];
        $pegawai->id_kelurahan = 1;
        $pegawai->id_jabatan = $request['id_jabatan'];
        $pegawai->nama = $request['nama'];
        $pegawai->jenis_kelamin = $request['jenis_kelamin'];
        $pegawai->alamat = $request['alamat'];
        $pegawai->no_telp = $request['no_telp'];
        $pegawai->status = $request['status'];
        $pegawai->password = bcrypt($request['nik_nip']);
        $pegawai->save();

     
            return redirect('/daftar_pegawai')->with('sukses','Data Berhasil Diinput');
     
}

    public function updateprofil(Request $request, $id_user){
        // $user = User::with(Auth::user()->id_user);
        // // $user = Auth::user();

        // // //jika user mengganti password
        // // if ($user->password != $request->password) {
        // //     $user->update([
        // //         "nama" => $request->nama,
        // //         "email" => $request->email,
        // //         "tgl_lahir" => $request->tgl_lahir,
        // //         "password" => Hash::make($request->password),
        // //         "gender" => $request->gender
        // //     ]);
        // // } else {
        // //     // Jika user tidak mengganti passwordnya

        //     $user->update([
        //         "nama" => $request->nama,
        //         "email" => $request->email,
        //         "tgl_lahir" => $request->tgl_lahir
        //     ]);
        $user = User::find(Auth::user()->id_user);
        $user->update($request->all());
        return redirect('/profilsetting/{id_user}');
    }

    public function edit($nik_nip){
        $user = User::find($nik_nip);
        $jabatan = Jabatan::all();
        return view('dashboard.admin.user.edit', compact('user','jabatan'));
    }

    public function update(Request $request, $nik_nip){

        $user = User::find($nik_nip);
        $user->nik_nip = $request->input('nik_nip');
        $user->id_jabatan = $request->input('id_jabatan');
        $user->id_kelurahan = $request->input('id_kelurahan');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->alamat = $request->input('alamat');
        $user->no_telp = $request->input('no_telp');
        $user->email = $request->input('email');
        $user->nama = $request->input('nama');
        $user->status = $request->input('status');

        $user->update();
        return redirect('/daftar_pegawai');
    }

    public function delete ($nik_nip){
        $user = User::find($nik_nip);
        $user->delete($user);
        return redirect('/daftar_pegawai')->with('hapus','Data Berhasil dihapus');
    }

    public function setting_profil ($nik_nip){
        $user = User::find(Auth::user()->nik_nip);
        $jabatan = Jabatan::all();
        return view ('dashboard.pegawai.setprof', compact('user','jabatan'));
    }

    public function profil_update(Request $request, $nik_nip){

        $request->validate([
            'nama' => 'required',
            'alamat'=> 'required',
            'no_telp'=>'required'
        ]);

        $user = User::find(Auth::user()->nik_nip);
        $user->update($request->all());
        return back()->with('update','Profil berhasil diupdate');
     
    }

    public function change_password($nik_nip){
        $user = User::find(Auth::user()->nik_nip);
        return view ('dashboard.pegawai.changepassword', compact('user'));
    }

    public function password_update(Request $request, $nik_nip){

        // $request->validate([
        //     'password' => ['required',':min8','string','confirmed'],
        // ]);

        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required',':min8','string'],
            'password_confirmation' => ['same:password'],
        ]);

        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if(FacadesHash::check($old_password,$currentPassword)){
            auth()->user()->update([
                'password'=> bcrypt(request('password')),
            ]);
            return back()->with('success','Berhasil mengubah password');
        }else{
            return back()->with('errors','isi password lama Anda dengan benar');
        }

        //  User::find(auth()->user()->nik_nip)->update(['password'=> bcrypt($request->password)]);
        //  return back()->with('success','Berhasil mengubah password');
        // $user = User::find(Auth::user()->nik_nip);
        // $user->update($request->all());
        // return redirect('/profile/{nik_nip}')->with('update','Profil berhasil diupdate');
    }
}



