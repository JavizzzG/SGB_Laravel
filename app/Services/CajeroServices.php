<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Tarjeta;
use App\Models\Billete;

class CajeroServices
{
    public static function hacerRetiro(Request $request) {
        $tarjeta = Tarjeta::find($request->session()->get("id_tarjeta"));
        if(!$tarjeta){
            return redirect()->back()->with('error', "Tarjeta no encontrada");
        }
        $validado = $request->validate([
            'valor_registro' => 'required|integer'
        ]);
        if($validado['valor_registro'] > $tarjeta->monto_tarjeta){
            return redirect()->back()->with('error', "Fondos insuficientes en la tarjeta");
        }
        $billetes = Billete::orderBy('valor_billete', 'desc')->get();
        $valor_registro = $validado['valor_registro'];
        $valor_actual = 0;
        $billetesEntregados = [];
        $informacion = [
            50000 => 0,
            20000 => 0,
            10000 => 0,
            5000 => 0,
        ];
        foreach($billetes as $billete){
            while($valor_actual + $billete->valor_billete <= $valor_registro && $billete->cantidad_billete > 0){
                $valor_actual += $billete->valor_billete;
                $billete->cantidad_billete -= 1;
                $billetesEntregados[] = $billete->valor_billete;
                $informacion[$billete->valor_billete] += 1;
            }
        }
        if($valor_actual < $valor_registro){
            return redirect()->back()->with('error', "No hay billetes suficientes para completar el retiro");
        }

        foreach($billetes as $billete){
            $billete->save();
            
        }
        $tarjeta->monto_tarjeta -= $valor_registro;
        $tarjeta->save();

        return $informacion;

    }
}