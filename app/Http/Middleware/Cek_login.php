<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$jabatans)
    {

        if(in_array($request->user()->id_jabatan,$jabatans)){
            return $next($request);
        }
        return redirect('/');
        // if(!Auth::check()){
        //     return redirect('login');
        // }
        // $user = Auth::user();

        // if($user->id_jabatan == $jabatans){
        //     return $next($request);
        // }

        // return redirect('login')->with('error',"Anda tidak memiliki akses masuk");
       
    }

  
}

