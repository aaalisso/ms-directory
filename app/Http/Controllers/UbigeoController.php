<?php

namespace App\Http\Controllers;

use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbigeoController extends Controller
{
    public function index()
    {
        $ubigeo_data = Ubigeo::all();
        return view('table_view.ubigeo', compact('ubigeo_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'acountry' => 'required',
            'adepartment' => 'required',
            'amunicipality' => 'required',
        ]);
        $ubigeo_data = new Ubigeo;
        $ubigeo_data->ubigeo_country = $request->input('acountry');
        $ubigeo_data->ubigeo_department = $request->input('adepartment');
        $ubigeo_data->ubigeo_municipality = $request->input('amunicipality');
        $ubigeo_data->save();
        return redirect()->back()->with('status', 'Registro Añadido Exitosamente.');
    }

    public function edit($id)
    {
        $ubigeo_data = Ubigeo::find($id);
        return response()->json(['ubigeo' => $ubigeo_data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'ucountry' => 'required',
            'udepartment' => 'required',
            'umunicipality' => 'required',
        ]);
        $id = $request->input('record_id');
        $ubigeo = Ubigeo::find($id);
        $ubigeo->ubigeo_country = $request->input('ucountry');
        $ubigeo->ubigeo_department = $request->input('udepartment');
        $ubigeo->ubigeo_municipality = $request->input('umunicipality');
        $ubigeo->update();
        // return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $id = $request->input('record_id');
        $ubigeo = Ubigeo::find($id);
        $ubigeo->delete();
        // return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
        return redirect()->back();
    }
}
