<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home2');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('accesos', App\Http\Controllers\AccesoController::class);

    Route::resource('tipos-obras', App\Http\Controllers\TiposObraController::class);

    Route::resource('tipos-funcionamientos', App\Http\Controllers\TiposFuncionamientoController::class);

    Route::resource('tipos-controles', App\Http\Controllers\TiposControleController::class);

    Route::resource('tipos-puertas', App\Http\Controllers\TiposPuertaController::class);

});

Auth::routes();