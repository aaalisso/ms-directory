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
            'aname' => 'required',
            'aaddress' => 'required',
            'aphone' => 'required',
            'awebpage' => 'required',
            'alogo' => 'required',
            'aubigeoid' => 'required',
        ]);
        $data = new Institution;
        $data->institution_name = $request->input('aname');
        $data->institution_address = $request->input('aaddress');
        $data->institution_phone = $request->input('aphone');
        $data->institution_web_page = $request->input('awebpage');
        $data->institution_logo = $request->input('alogo');
        $data->ubigeo_id = $request->input('aubigeoid');
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
            'uname' => 'required',
            'uaddress' => 'required',
            'uphone' => 'required',
            'uwebpage' => 'required',
            'ulogo' => 'required',
            'uubigeoid' => 'required',
        ]);
        $id = $request->input('edit_id');
        $data_insert = Institution::find($id);
        $data_insert->institution_name = $request->input('uname');
        $data_insert->institution_address = $request->input('uaddress');
        $data_insert->institution_phone = $request->input('uphone');
        $data_insert->institution_web_page = $request->input('uwebpage');
        $data_insert->institution_logo = $request->input('ulogo');
        $data_insert->ubigeo_id = $request->input('uubigeoid');
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
