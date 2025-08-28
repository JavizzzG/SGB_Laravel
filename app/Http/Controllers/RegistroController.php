<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Services\CajeroServices; // importamos el servicio par usarlo más adelante
use Exception;


class RegistroController extends Controller
{
    public function retirar(Request $request){ // función que se encarga de de hacer el registro y llamar al servicio para esto
        $validado = $request->validate([
            'accion_registro' => 'required|integer',
            'valor_registro' => 'required|integer'
        ]);

        try {
            $informacion = CajeroServices::hacerRetiro($request);  //llamado al servicio y se le pasan los datos necesarios
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        Registro::create([ //finalmente se crea el registro en la base de datos
            'tarjeta_id' => session('id_tarjeta'),
            'accion_registro' => $validado['accion_registro'],
            'valor_registro' => $validado['valor_registro']
        ]);
        return view('cajero.final', compact('informacion'))->with('success', "Retiro registrado correctamente"); //retorna la vista final donde se muestran los datos del retiro
    }
}
