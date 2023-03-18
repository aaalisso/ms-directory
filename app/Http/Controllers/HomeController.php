<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() 
    {
        $user_auth = Auth::user();
        if(!$user_auth)
        {
            return view('home');
        }
        else{
            return redirect()->intended('admin');
        }
    }
}