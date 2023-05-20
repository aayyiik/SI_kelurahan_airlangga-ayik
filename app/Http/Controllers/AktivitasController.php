<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use App\Models\Aktivitas;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Signature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AktivitasController extends Controller
{
    public function index(){

            $user = Auth::user();
            if($user->id_jabatan=='14'){
                $aktivitas = Aktivitas::orderBy('created_at','desc')->get();
                $jabatan = Jabatan::all();
                $user = User::all();
                return view('dashboard.pegawai.aktivitas.index',compact('aktivitas','user','jabatan'));
            }else{
                $lihatAktivitas = Aktivitas::where('no_pegawai','=',Auth::user()->nik_nip)->orderBy('created_at','desc')->get();
                $jabatan = Jabatan::all();
                $user = User::all();
                return view('dashboard.pegawai.aktivitas.index',compact('lihatAktivitas','user','jabatan'));
            }
        
        // ->orderBy('created_at','desc')->get();
        
    }

    public function create (Request $request){
 
        $log = new Aktivitas;
        $log->no_pegawai = Auth::user()->nik_nip;
        $log->nama_aktivitas = $request->input('nama_aktivitas');
        $log->tanggal = $request->input('tanggal');
        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $file->move('assets/img/log/',$filname);
            $log->foto = $filname;
        }
        $log->save();
        return redirect ('/log_aktivitas')->with('sukses','Data Berhasil Diinput');

    }

    public function edit($id_aktivitas){
        $log = Aktivitas::find($id_aktivitas);
        return view('dashboard.pegawai.aktivitas.edit',compact('log'));
    }

    public function update(Request $request, $id_aktivitas){

        $log = Aktivitas::find($id_aktivitas);
        $log->no_pegawai = $request->input('no_pegawai');
        $log->nama_aktivitas = $request->input('nama_aktivitas');
        $log->tanggal = '2022-10-10';

        if($request->hasFile('foto')){
            $destination = 'assets/img/log/'.$log->foto;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filname = time().'.'.$extention;
            $file->move('assets/img/log/',$filname);
            $log->foto = $filname;
        }
        $log->update();
        return redirect ('/log_aktivitas')->with('update','Data Berhasil Diperbarui');
    }

    public function delete($id_aktivitas){
        $log = Aktivitas::find($id_aktivitas);
        $destination = 'assets/img/log/'.$log->foto;
        if(File::exists($destination)){
            File::delete($destination);
        }

        $log->delete();

        return redirect('/log_aktivitas')->with('hapus','Data Berhasil dihapus');

    }

    public function print_aktivitas(){
        return view('dashboard.pegawai.aktivitas.print');
    }

    public function displayLaporan(Request $request)
    {
        $request->validate([
            'tgl_awal' => ['date'],
            'tgl_akhir' => ['date', 'after_or_equal:tgl_awal']
        ]);

        $idSudahPrint = Aktivitas::pluck('no_pegawai');

        $data['displayLaporan'] = Aktivitas::where('no_pegawai','=',Auth::user()->nik_nip)->when($request->tgl_awal, function ($query) use ($request) {
            $query->whereBetween('tanggal', [$request->tgl_awal, $request->tgl_akhir . ' 23:59:59']);
        })->whereNotIn('id_aktivitas', $idSudahPrint)->get();
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        // dd($data['sidangBelumHonor']->pluck('id'));
        $data['displayLaporanr'] = $data['displayLaporan']->pluck('id_aktivitas');

        return view('dashboard.pegawai.aktivitas.print', $data);
    }
    
    public function store(Request $request, $tgl_awal, $tgl_akhir)
    {

        $data['lurah'] = Signature::where('id_jabatan','=','1')->get();
        $data['sekretaris'] = Signature::where('id_jabatan','=','2')->get();
        // $data['sekretaris'] = Signature::join('jabatan','users.id_jabatan','=','jabatan.id_jabatan')
        //                             ->where('users.id_jabatan','=','2')->get();

        $idSudahPrint = Aktivitas::pluck('id_aktivitas');

        $data['displayLaporan'] = Aktivitas::where('no_pegawai','=',Auth::user()->nik_nip)->when($request->tgl_awal, function ($query) use ($request) {
            $query->whereBetween('tanggal', [$request->tgl_awal, $request->tgl_akhir . ' 23:59:59']);
        })->get();
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['nomor'] = $request->nomor;
        $data['bulan'] = $request->bulan;
        $data['tanggal'] = Carbon::today()->format('d/m/Y');
        // dd($data['sidangBelumHonor']->pluck('id'));
        $data['displayLaporanr'] = $data['displayLaporan']->pluck('id_aktivitas');

        return view('dashboard.pegawai.aktivitas.cetak', $data);
    }
}
