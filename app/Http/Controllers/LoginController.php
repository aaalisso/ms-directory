<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function home(){       
       
        return view('home');
    }

    public function index(){
        $datos = User::all();
        //echo $datos;
        return view('login_view.login', ['datos'=>$datos]);
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // $credentials = $request->only('email', 'password');
        // if(Auth::attempt($credentials)){
        //     return redirect()->intended('dashboard')->with('message','Signed in!');
        // }
        // $request = DB::table('users as u')->join('contraseña as c', 'u.id', "=", 'c.id_user')
        // ->select('u.email','c.password')
        // ->get();
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('message','Signed in!');
        }
        return redirect('/login')->with('message', 'el correo y/o contraseña no son validos');
    }
}
