<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function admin()
    {
        if (!Auth::user()) {
            return view('home');
        } else {
            $user_id = Auth::user()->user_id;
            $user_info = DB::table('user as u')->select(
                'p.person_name',
                'p.person_surname'
            )
                ->join('person as p', 'u.person_id', '=', 'p.person_id')
                ->where('u.user_id', '=', $user_id)->first();
            // echo ($user_data);
            // exit();
            return view('admin_view.main')->with('user_info', $user_info);
        }
    }
    public function show()
    {
        $user_auth = Auth::user();
        if (!$user_auth) {
            return view('login_view.login');
        } else {
            return redirect()->intended('admin');
        }
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
