<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BilleteController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\RegistroController;
use App\Services\CajeroServices;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/', [TarjetaController::class, 'getInfo'])->name("getInfo");

Route::get('/menu', function () {
    return view('cajero.menu');
});

Route::get('/retiro', function () {
    return view('cajero.retirar');
})->name("cajero.retirar");

Route::post("/procesando_retiro", [CajeroServices::class, 'hacerRetiro'])->name("cajero.procesando_retiro");
Route::post('/retirando', [RegistroController::class, 'retirar'])->name("retirar");
Route::get('/final', function () {
    return view('cajero.final');
})->name("cajero.final");

Route::get('/pruebas', [BilleteController::class, 'getAll'])->name("pruebas");
Route::put('/pruebas/{id}', [BilleteController::class, 'update'])->name("update");