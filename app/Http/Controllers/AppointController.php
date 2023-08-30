<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appoint;
use App\Models\Patient;

class AppointController extends Controller
{
    public function index(){
        $appoints = Appoint::all();
        return $appoints;
    }

    public function store(Request $request){
        $appoints = Appoint::create($request->all());
        return response()->json($appoints,201);
    }

    public function update(request $request, string $id){
        $appoints = Appoint::findOrFail($id);
        $appoints->update($request->all());
        return response()->json($appoints,200);
    }

    public function showAll(){
        $appoints = Patient::with('appoint')->get();
        return $appoints;
    }
}
