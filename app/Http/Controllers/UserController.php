<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = DB::table('user as u')->select(
            'p.person_name',
            'p.person_surname',
            'u.user_state',
            'u.user_id',
        )
            ->join('person as p', 'u.person_id', '=', 'p.person_id')->get();
        return view('table_view.user', compact('data'));
    }

    public function get_roles($id)
    {
        $fill = DB::table('user_role as ur')->select(
            'ur.id',
            'p.person_name',
            'ur.state',
            'ur.user_id',
            'r.role_id as role_id',
            'r.role_description as role_description'
        )
            ->join('role as r', 'ur.role_id', '=', 'r.role_id')
            ->join('user as u', 'ur.user_id', '=', 'u.user_id')
            ->join('person as p', 'p.person_id', '=', 'u.person_id')
            ->where('ur.user_id', $id)->get();
        return view('role_table', compact('fill'));
    }

    public function change($id)
    {
        $id = request('ur_id');
        $user_id = request('user_id');

        $data = User_Role::find($id);
        $data->state = request('state');
        $data->update();
        $fill = DB::table('user_role as ur')->select(
            'ur.id',
            'p.person_name',
            'ur.state',
            'ur.user_id',
            'r.role_id as role_id',
            'r.role_description as role_description'
        )
            ->join('role as r', 'ur.role_id', '=', 'r.role_id')
            ->join('user as u', 'ur.user_id', '=', 'u.user_id')
            ->join('person as p', 'p.person_id', '=', 'u.person_id')
            ->where('ur.user_id', $user_id)->get();
        return view('role_table', compact('fill'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'apassword' => 'required',
            'astate' => 'required',
            'apersonid' => 'required',
            'aroleid' => 'required',
        ]);

        $person = DB::table('person')->select('person_email')->where('person_id', '=', $request->apersonid)->first();

        $data = new User();
        $data->email = $person->person_email;
        $data->password = Hash::make($request->input('apassword'));
        $data->user_state = $request->input('astate');
        $data->person_id = $request->input('apersonid');
        $data->role_id = $request->input('aroleid');
        $data->save();
        return redirect()->back()->with('status', 'Registro Añadido Exitosamente.');
    }
    public function edit($id)
    {
        $data = User::find($id);
        return response()->json(['user' => $data]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'upassword' => 'required',
            'ustate' => 'required',
            'upersonid' => 'required',
        ]);
        $id = $request->input('record_id');
        $data = User::find($id);
        $data->password = Hash::make($request->input('upassword'));
        $data->user_state = $request->input('ustate');
        $data->person_id = $request->input('upersonid');
        $data->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('record_id');
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
