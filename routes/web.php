<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BilleteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pruebas', [BilleteController::class, 'getAll'])->name("pruebas");
Route::put('/pruebas/{id}', [BilleteController::class, 'update'])->name("update");