<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
        return view('login_view.login', compact('datos'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('person')->join('user', 'user_id', '=', 'person.person_id')->select('person.person_email', 'user.user_password')->where('person.person_email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->password, $user->user_password)) {
            return redirect()->intended('login', 'status', 'error');
        } else {
            return view('home');
        }
    }
}
