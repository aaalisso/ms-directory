<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Ubigeo;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        $person_data = Person::paginate(5);
        return view('table_view.person', compact('person_data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'add_name' => 'required',
            'add_surname' => 'required',
            'add_email' => 'required',
            'add_identity_document' => 'required',
            'add_address' => 'required',
            'add_phone' => 'required',
            'add_web_page' => 'required',
            'add_profile_picture' => 'required',
            'add_birthday_date' => 'required',
            'add_ubigeo_id' => 'required',
        ]);
        $person_data = new Person;
        $person_data->person_name = $request->input('add_name');
        $person_data->person_surname = $request->input('add_surname');
        $person_data->person_email = $request->input('add_email');
        $person_data->person_identity_document = $request->input('add_identity_document');
        $person_data->person_address = $request->input('add_address');
        $person_data->person_phone = $request->input('add_phone');
        $person_data->person_web_page = $request->input('add_web_page');
        $person_data->person_profile_picture = $request->input('add_profile_picture');
        $person_data->person_birthday_date = $request->input('add_birthday_date');
        $person_data->ubigeo_id = $request->input('add_ubigeo_id');
        $person_data->save();
        return redirect()->back()->with('status', 'Registro Añadido Exitosamente.');
    }

    public function edit($id)
    {
        $person_data = Person::find($id);
        return response()->json(['person' => $person_data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'aname' => 'required',
            'asurname' => 'required',
            'aemail' => 'required',
            'aiddoc' => 'required',
            'aaddress' => 'required',
            'aphone' => 'required',
            'awebpage' => 'required',
            'aphoto' => 'required',
            'abirthdate' => 'required',
            'ubigeoid' => 'required',
        ]);
        $id = $request->input('edit_id');
        $person = Person::find($id);
        $person->person_name = $request->input('aname');
        $person->person_surname = $request->input('asurname');
        $person->person_email = $request->input('aemail');
        $person->person_identity_document = $request->input('aiddoc');
        $person->person_address = $request->input('aaddress');
        $person->person_phone = $request->input('aphone');
        $person->person_web_page = $request->input('awebpage');
        $person->person_profile_picture = $request->input('aphoto');
        $person->person_birthday_date = $request->input('abirthdate');
        $person->person_ubigeo_id = $request->input('aubigeoid');
        $person->update();
        return redirect()->back()->with('status', 'Registro Actualizado Exitosamente.');
    }

    public function destroy(Request $request)
    {
        $id = $request->input('delete_id');
        $person = Person::find($id);
        $person->delete();
        return redirect()->back()->with('status', 'Registro Eliminado Exitosamente.');
    }
}
