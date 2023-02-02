<?php

namespace App\Http\Controllers;

use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index(){
        // $data = Ubigeo::all();
        $data = Ubigeo::select('ubigeo_id',DB::raw('CONCAT(ubigeo_country, ubigeo_department, ubigeo_municipality) AS ubigeo'))->get();
        return view('login_view.register', compact('data'));
    }
}
