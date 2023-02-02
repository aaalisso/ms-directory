<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function index()
    {
        $data = Institution::paginate(5);
        return view('table_view.institution', compact('data'));
    } public function store(Request $request)
    {
        $request->validate([
            'add_name' => 'required',
            'add_address' => 'required',
            'add_phone' => 'required',
            'add_web_page' => 'required',
            'add_logo' => 'required',
            'add_ubigeo_id' => 'required',
        ]);
        $data = new Institution;
        $data->institution_name = $request->input('add_name');
        $data->institution_address = $request->input('add_address');
        $data->institution_phone = $request->input('add_phone');
        $data->institution_web_page = $request->input('add_web_page');
        $data->institution_logo = $request->input('add_logo');
        $data->ubigeo_id = $request->input('add_ubigeo_id');
        $data->save();
        return redirect()->back()->with('status', 'Registro Añadido Exitosamente.');
    }

    public function edit($id)
    {
        $data = Institution::find($id);
        return response()->json(['institution' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'edit_name' => 'required',
            'edit_address' => 'required',
            'edit_phone' => 'required',
            'edit_web_page' => 'required',
            'edit_logo' => 'required',
            'edit_ubigeo_id' => 'required',
        ]);
        $id = $request->input('edit_id');
        $data_insert = Institution::find($id);
        $data_insert->institution_name = $request->input('edit_name');
        $data_insert->institution_address = $request->input('edit_address');
        $data_insert->institution_phone = $request->input('edit_phone');
        $data_insert->institution_web_page = $request->input('edit_web_page');
        $data_insert->institution_logo = $request->input('edit_logo');
        $data_insert->ubigeo_id = $request->input('edit_ubigeo_id');
        $data_insert->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $data = Institution::find($id);
        $data->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
