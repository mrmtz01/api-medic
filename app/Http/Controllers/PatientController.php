<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    //
    public function index(){
        $patients = Patient::all();
        return $patients;
    }

    //$request = {"name": jairo, "age": 23}
    public function store(Request $request){
        $patient = Patient::create($request->all());
        return response()->json($patient,201);
    }

    public function update(request $request, string $id){
        $patient = Patient::findOrFail($id);
        $patient->update($request->all());
        return response()->json($patient,200);
    }

    public function updateStatus(Request $request, $id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $patient->status = 'inactive';
        $patient->save();

        return response()->json(['message' => 'Estado del paciente actualizado a inactivo']);
    }
}
