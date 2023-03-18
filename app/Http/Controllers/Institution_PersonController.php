<?php

namespace App\Http\Controllers;

use App\Models\Institution_Person;
use Illuminate\Http\Request;

class Institution_PersonController extends Controller
{
    public function index()
    {
        $inst_pers_data = Institution_Person::paginate(5);
        return view('table_view.institution_person', compact('inst_pers_data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ainstitutionid' => 'required',
            'apersonid' => 'required',
            'aoccupation' => 'required',
            'ainstitutionalemail' => 'required',
            'aincorporationdate' => 'required',
        ]);
        $inst_pers_data = new Institution_Person;
        $inst_pers_data->institution_id = $request->input('add_institution_id');
        $inst_pers_data->person_id = $request->input('add_person_id');
        $inst_pers_data->occupation = $request->input('add_occupation');
        $inst_pers_data->institutional_email = $request->input('add_institutional_email');
        $inst_pers_data->incorporation_date = $request->input('add_incorporation_date');
        $inst_pers_data->save();
        return redirect()->back()->with('status', 'Registro Añadido Exitosamente.');
    }
    public function edit($id)
    {
        $inst_pers_data = Institution_Person::find($id);
        return response()->json(['inst_pers' => $inst_pers_data]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'add_institution_id' => 'required',
            'add_person_id' => 'required',
            'add_occupation' => 'required',
            'add_institutional_email' => 'required',
            'add_incorporation_date' => 'required',
        ]);
        $id = $request->input('edit_id');
        $inst_pers_data = Institution_Person::find($id);
        $inst_pers_data->institution_id = $request->input('add_institution_id');
        $inst_pers_data->person_id = $request->input('add_person_id');
        $inst_pers_data->occupation = $request->input('add_occupation');
        $inst_pers_data->institutional_email = $request->input('add_institutional_email');
        $inst_pers_data->incorporation_date = $request->input('add_incorporation_date');
        $inst_pers_data->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }
    
    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $inst_pers_data = Institution_Person::find($id);
        $inst_pers_data->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
