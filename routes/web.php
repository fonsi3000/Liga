<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});




Route::post('/unirse', [UsuarioController::class, 'store'])->name('unirse.store');
