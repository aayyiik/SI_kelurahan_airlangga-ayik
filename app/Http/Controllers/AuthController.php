<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){

        $this->validate($request, [
            'nik_nip'=>'required',
            'password'=>'required',
        ]);

        $user = $request->only('nik_nip','password');
        if(Auth::attempt($user)){
            $user = Auth::user();
            if($user->id_jabatan=='14'){
                return redirect('/dashboardAdmin');
            }else{
                return redirect ('/dashboard');
            }

            return redirect()->intended('/login');
        }

       

        return redirect('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Username / Password Tidak Sesuai']);
    
        }

            public function logout (Request $request){
                $request->session()->flush();
                Auth::logout();
                return redirect('/login');

            }
}
