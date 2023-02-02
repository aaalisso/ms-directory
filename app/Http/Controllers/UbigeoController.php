<?php

namespace App\Http\Controllers;

use App\Models\Ubigeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbigeoController extends Controller
{
    public function index()
    {
        $ubigeo_data = Ubigeo::paginate(20);
        return view('table_view.ubigeo', compact('ubigeo_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'add_country' => 'required',
            'add_department' => 'required',
            'add_municipality' => 'required',
        ]);
        $ubigeo_data = new Ubigeo;
        $ubigeo_data->ubigeo_country = $request->input('add_country');
        $ubigeo_data->ubigeo_department = $request->input('add_department');
        $ubigeo_data->ubigeo_municipality = $request->input('add_municipality');
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
            'edit_country' => 'required',
            'edit_department' => 'required',
            'edit_municipality' => 'required',
        ]);
        $id = $request->input('edit_id');
        $ubigeo = Ubigeo::find($id);
        $ubigeo->ubigeo_country = $request->input('edit_country');
        $ubigeo->ubigeo_department = $request->input('edit_department');
        $ubigeo->ubigeo_municipality = $request->input('edit_municipality');
        $ubigeo->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $ubigeo = Ubigeo::find($id);
        $ubigeo->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
