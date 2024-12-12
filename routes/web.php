<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/perfil', [ProfileController::class, 'edit'])->name('perfil');

Route::get('/mis-pedidos', [ProfileController::class, 'mis-pedidos'])->name('mis-pedidos');

require __DIR__.'/auth.php';





Route::get('/nuevo-pedido/paso1', [PedidoController::class, 'pantalla1'])->name('pantalla1');
Route::post('/nuevo-pedido/paso2', [PedidoController::class, 'pantalla2'])->name('pantalla2');
Route::post('/nuevo-pedido/paso3', [PedidoController::class, 'pantalla3'])->name('pantalla3');
Route::post('/nuevo-pedido/paso4', [PedidoController::class, 'pantalla4'])->name('pantalla4');
Route::post('/nuevo-pedido/paso5', [PedidoController::class, 'pantalla5'])->name('pantalla5');
Route::post('/nuevo-pedido/paso6', [PedidoController::class, 'pantalla6'])->name('pantalla6');
Route::post('/nuevo-pedido/paso7', [PedidoController::class, 'pantalla7'])->name('pantalla7');
Route::post('/nuevo-pedido/paso8', [PedidoController::class, 'pantalla8'])->name('pantalla8');
Route::post('/nuevo-pedido/paso9', [PedidoController::class, 'pantalla9'])->name('pantalla9');
Route::post('/nuevo-pedido/paso10', [PedidoController::class, 'pantalla10'])->name('pantalla10');
