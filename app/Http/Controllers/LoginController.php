<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function home()
    {

        return view('home');
    }

    public function index()
    {
        $datos = User::all();
        //echo $datos;
        return view('login_view.login', ['datos' => $datos]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            // 'password' => 'required',
        ]);
        // $credentials = $request->only('email', 'password');
        // if(Auth::attempt($credentials)){
        //     return redirect()->intended('dashboard')->with('message','Signed in!');
        // }
        // $request = DB::table('users as u')->join('contraseña as c', 'u.id', "=", 'c.id_user')
        // ->select('u.email','c.password')
        //     // ->get();
        //     $credentials = $request->only('email','password');
        //     if(Auth::attempt($credentials)){
        //         return redirect()->intended('dashboard')->with('message','Signed in!');
        //     }
        //     return redirect('/login')->with('message', 'el correo y/o contraseña no son validos');
        // }
        // $email = $request->input('email');
        // $password = $request->input('password');        

        // $data = DB::table('person')->join('user','user_id','=','person.person_id')->select('person.person_email','user.user_password')->where('person.person_email','=',$email);
        // if (!$data) {
        //     return view('login_view.login', compact('data'));
        // }
        // // if (!Hash::check($password, $data->user_password)) {
        // //     return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
        // // }
        // return response()->json(['success'=>true,'message'=>'success', 'data' => $data]);
    }
}
