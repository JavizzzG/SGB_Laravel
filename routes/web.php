<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BilleteController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\RegistroController;
use App\Services\CajeroServices;

// Ruta principal
Route::get('/', function () {
    return view('index');
})->name('index');

// Ruta para procesar el formulario de los datos de la tarjeta
Route::post('/', [TarjetaController::class, 'getInfo'])->name("getInfo");


// Ruta que permite elegir la acción a realizar
Route::get('/menu', function () {
    return view('cajero.menu');
})->middleware('tarjeta')->name('cajero.menu');

//Ruta que permite ver el saldo total de la tarjeta

// Ruta para la vista donde se puede realizar un retiro de dinero
Route::get('/retiro', function () {
    return view('cajero.retirar');
})->middleware('tarjeta')->name("cajero.retirar");

// Ruta para la vista final después de realizar un retiro
Route::get('/final', function () {
    return view('cajero.final');
})->middleware('tarjeta')->name("cajero.final");

// Rutas de funcionalidades
Route::post("/procesando_retiro", [CajeroServices::class, 'hacerRetiro'])->middleware('tarjeta')->name("cajero.procesando_retiro");
Route::post('/retirando', [RegistroController::class, 'retirar'])->middleware('tarjeta')->name("retirar");
Route::post('/saldo', [TarjetaController::class, 'getSaldo'])->middleware('tarjeta')->name("getSaldo");