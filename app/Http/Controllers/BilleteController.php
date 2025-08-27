<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billete;

class BilleteController extends Controller
{
    public function getAll(){
        $billetes = Billete::all();
        return view('pruebas', compact('billetes'));
    }

    public function update(Request $request, $id){
        $billete = Billete::find($id);

        if(!$billete){
            return response()->json("Billete no encontrado", 404);
        }
        $billete->update($request->all());
        return redirect()->route('pruebas')->with('success', "Billete actualizado correctamente");
    }
}
