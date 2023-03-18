<?php

namespace App\Http\Controllers;

use App\Models\Ubigeo;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        $user_auth = Auth::user();
        if(!$user_auth)
        {
            $data = Ubigeo::select('ubigeo_id', DB::raw('CONCAT(ubigeo_country, " - " ,ubigeo_department, " - ", ubigeo_municipality) AS ubigeo'))->get();
            return view('login_view.register', compact('data'));
        }
        else{
            return redirect()->intended('admin');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'iddoc' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'web_page' => 'required',
            'profile_picture' => 'required',
            'birthday' => 'required',
            'ubigeo' => 'required',
            'password' => 'required',
        ]);
        
        $persondata = new Person;        
        $persondata->person_name = $request->input('name');
        $persondata->person_surname = $request->input('surname');
        $persondata->person_email = $request->input('email');
        $persondata->person_identity_document = $request->input('iddoc');
        $persondata->person_address = $request->input('address');
        $persondata->person_phone = $request->input('phone');
        $persondata->person_web_page = $request->input('web_page');
        $persondata->person_profile_picture = $request->input('profile_picture');
        $persondata->person_birthday_date = $request->input('birthday');
        $persondata->ubigeo_id = $request->input('ubigeo');
        $persondata->save();     

        $userdata = new User;
        $userdata->email = $persondata->person_email;
        $userdata->password = Hash::make($request->input('password'));
        $userdata->user_state = '1';
        $userdata->person_id = $persondata->person_id;
        $userdata->save();
        return redirect()->back()->with('status','Registro Exitoso.');
    }
}
