<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Services\CajeroServices;

class RegistroController extends Controller
{
    public function create(Request $request){
        $validado = $request->validate([
            'tarjeta_id' => 'required',
            'accion_registro' => 'required',
            'valor_registro' => 'required'
        ]);

        Registro::create($validado);
        return redirect()->route('pruebas')->with('success', "Registro creado correctamente");
    }

    public function retirar(Request $request){
        $validado = $request->validate([
            'accion_registro' => 'required|integer',
            'valor_registro' => 'required|integer'
        ]);

        $informacion = CajeroServices::hacerRetiro($request);

        Registro::create([
            'tarjeta_id' => session('id_tarjeta'),
            'accion_registro' => $validado['accion_registro'],
            'valor_registro' => $validado['valor_registro']
        ]);
        return view('cajero.final', compact('informacion'))->with('success', "Retiro registrado correctamente");
    }
}
