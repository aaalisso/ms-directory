<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data = User::paginate(5);
        return view('table_view.user', compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'add_password' => 'required',
            'add_state' => 'required',
            'add_person_id' => 'required',
        ]);
        $data = new User();
        $data->user_password = Hash::make($request->input('add_password'));
        $data->user_state = $request->input('add_state');
        $data->person_id = $request->input('add_person_id');
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
            'edit_password' => 'required',
            'edit_state' => 'required',
            'edit_person_id' => 'required',
        ]);
        $id = $request->input('edit_id');
        $data = User::find($id);
        $data->user_password = Hash::make($request->input('edit_password'));
        $data->user_state = $request->input('edit_state');
        $data->person_id = $request->input('edit_person_id');
        $data->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
