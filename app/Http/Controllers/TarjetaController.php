<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarjeta;

class TarjetaController extends Controller
{
    public function getInfo(Request $request){ //funcion para comprobar si la tarjeta existe
        $validado = $request->validate([
            'numero_tarjeta' => 'required'
        ]);

        $tarjeta = Tarjeta::where('numero_tarjeta', $validado['numero_tarjeta'])->First();
        if(!$tarjeta){
            return redirect()->back()->with('error', "Tarjeta no encontrada");
        }
        session(["numero_tarjeta" => $tarjeta->numero_tarjeta, "id_tarjeta" => $tarjeta->id]); // se guardan algunos datos de la tarjeta en una session
        return view('cajero.menu', compact('tarjeta'))->with('success', "Tarjeta encontrada correctamente"); //se manda directamente al modulo de retiro
    }

    public function getSaldo()
    {
        $tarjeta = Tarjeta::where('numero_tarjeta', session('numero_tarjeta'))->First();
        return view('cajero.saldo', compact('tarjeta'));
    }
}
