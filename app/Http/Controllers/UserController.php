<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Role;
use App\Models\User;
use App\Models\User_Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Completion\Output\ZshCompletionOutput;

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
        try {
            $roles = Role::all();
            $countRoles = count($roles);
            $user_info = DB::table('user as u')->select(
                'p.person_name',
                'p.person_surname',
                'u.user_id',
            )
                ->join('person as p', 'u.person_id', '=', 'p.person_id')
                ->where('u.user_id', $id)->first();
            $fill = DB::table('user_role as ur')->select(
                'ur.id',
                'p.person_name',
                'ur.ur_state',
                'ur.user_id',
                'r.role_id as role_id',
                'r.role_description as role_description'
            )
                ->join('role as r', 'ur.role_id', '=', 'r.role_id')
                ->join('user as u', 'ur.user_id', '=', 'u.user_id')
                ->join('person as p', 'p.person_id', '=', 'u.person_id')
                ->where('ur.user_id', $id)->get();

            $countFill = count($fill);
            if ($countFill == $countRoles) {
                $addRoleBtnState = 0;
            } else {
                $addRoleBtnState = 1;
            }
            // print_r($fill);
            // print_r('-----------------------------------------------');
            // print_r($addRoleBtnState);
            // exit();
            return view('layout.role_table', compact('user_info', 'fill', 'addRoleBtnState'));
        } catch (\Exception $e) {
            $user_info = DB::table('user as u')->select(
                'p.person_name',
                'p.person_surname',
                'u.user_id',
            )
                ->join('person as p', 'u.person_id', '=', 'p.person_id')
                ->where('u.user_id', $id)->first();
            $fill = [];
            // print_r($fill);
            // exit();
            return view('layout.role_table', compact('user_info', 'fill'));
        }
    }
    public function change($ur_id)
    {
        $user_id = request('user_id');
        $state = request('state');

        $data = User_Role::find($ur_id);
        $data->ur_state = $state;
        $data->update();

        $getdata = $this->get_roles($user_id);
        return response($getdata);
    }

    //start section en proceso
    public function show_add_role()
    {
        try {
            $user_id = request('user_id');
            $user_info = DB::table('user as u')->select(
                'p.person_name',
                'u.user_id as user_id'
            )
                ->join('person as p', 'u.person_id', '=', 'p.person_id')
                ->where('u.user_id', $user_id)->first();
            $rolelist = DB::table('role as r')
                ->select('r.role_id', 'r.role_description')
                ->leftJoin('user_role as ur', 'r.role_id', '=', 'ur.role_id')
                ->whereNull('ur.role_id')->orderBy('r.role_id')->get();
            return view('layout.add_role', compact('user_info', 'rolelist'));
        } catch (\Exception $e) {
            $user_id = request('user_id');
            $user_info = DB::table('user as u')->select(
                'p.person_name',
                'u.user_id as user_id'
            )
                ->join('person as p', 'u.person_id', '=', 'p.person_id')
                ->where('u.user_id', $user_id)->first();
            $rolelist = DB::table('role')
                ->select('role_id', 'role_description')
                ->orderBy('r.role_id')->get();
            // echo($rolelist);
            // exit();
            return view('layout.add_role', compact('user_info', 'rolelist'));
        }
    }
    public function add_role(Request $request)
    {
        $record = $request->input('role');
        $user_id = $request->input('user_id');
        $record_lenght = count($record);

        for ($index = 0; $index < $record_lenght; $index++) {
            if (isset($record[$index])) {
                $row = new User_Role();
                $row->user_id = $user_id;
                $row->role_id = $request->input("role.{$index}");
                // print_r('**fila: ');
                // print_r(' *usuario: ');
                // print_r($row->user_id);
                // print_r(' *Role: ');
                // print_r($row->role_id);
                // print_r($record);
                $row->save();
            }
        }
        // exit();
        $showdata = $this->get_roles($user_id);
        return response($showdata);
        // $getdata = $this->get_roles($user_id);
        // return view($getdata);
    }
    //endsection en proceso

    public function store(Request $request)
    {
        $request->validate([
            'apassword' => 'required',
            'apersonid' => 'required',
        ]);

        $person = DB::table('person')->select('person_email')->where('person_id', '=', $request->apersonid)->first();

        $data = new User();
        $data->email = $person->person_email;
        $data->password = Hash::make($request->input('apassword'));
        $data->person_id = $request->input('apersonid');
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

    public function delete($id)
    {
        $user_role = DB::table('user_role')->where('user_id', $id)->get();
        foreach ($user_role as $role) {
            DB::table('user_role')->where('id', $role->id)->delete();
        }
        $data = User::find($id);
        $data->delete();
        return response()->json(['status', 'welcome']);
    }
}
