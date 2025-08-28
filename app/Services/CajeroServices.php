<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Tarjeta; //importamos los modelos que vamos a utilizar
use App\Models\Billete;

class CajeroServices
{
    public static function hacerRetiro(Request $request) {
        $tarjeta = Tarjeta::find($request->session()->get("id_tarjeta")); //revisa si la sesión está abierta con la tarjeta
        if(!$tarjeta){
            return redirect()->back()->with('error', "Tarjeta no encontrada");
        }
        $validado = $request->validate([ //valida el monto
            'valor_registro' => 'required|integer'
        ]);
        if($validado['valor_registro'] > $tarjeta->monto_tarjeta){ //revisa si el monto de la tarjeta es sufciciente y cubre el retiro
            return redirect()->back()->with('error', "Fondos insuficientes en la tarjeta");
        }
        $billetes = Billete::orderBy('valor_billete', 'desc')->get(); //trae los billetes ordenados de mayor a menor
        $valor_registro = $validado['valor_registro']; //metemos el valor del monto en otra variable
        $valor_actual = 0; // desde el cual empezamos a contar billetes
        $billetesEntregados = []; //lista de billetes que son entregados en el retiro
        $informacion = [ //un array para llevar el conteo de billetes entregados al usuario
            50000 => 0,
            20000 => 0,
            10000 => 0,
            5000 => 0,
        ];
        foreach($billetes as $billete){ //bucle que permite entregar los billetes
            while($valor_actual + $billete->valor_billete <= $valor_registro && $billete->cantidad_billete > 0){
                $valor_actual += $billete->valor_billete;
                $billete->cantidad_billete -= 1;
                $billetesEntregados[] = $billete->valor_billete;
                $informacion[$billete->valor_billete] += 1;
            }
        }
        if($valor_actual < $valor_registro){ //comprueba que no se de más del que se requiere
            return redirect()->back()->with('error', "No hay billetes suficientes para completar el retiro");
        }

        foreach($billetes as $billete){ //disminuye la cantidad de billetes en la base de datos
            $billete->save();
            
        }
        $tarjeta->monto_tarjeta -= $valor_registro; //resta a la tarjeta el monto que se acaba de retirar
        $tarjeta->save(); // se guarda esto en la db

        return $informacion; // se retorna el array de los billetes que han sido entregados al usuario

    }
}