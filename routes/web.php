<?php

use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('accesos', App\Http\Controllers\AccesoController::class);

    Route::resource('tipos-obras', App\Http\Controllers\TiposObraController::class);

    Route::resource('tipos-funcionamientos', App\Http\Controllers\TiposFuncionamientoController::class);

    Route::resource('tipos-controles', App\Http\Controllers\TiposControleController::class);

    Route::resource('tipos-puertas', App\Http\Controllers\TiposPuertaController::class);

    Route::resource('detalles-puertas', App\Http\Controllers\DetallesPuertaController::class);

    Route::resource('tipos-patin-retractiles', App\Http\Controllers\TiposPatinRetractileController::class);

    Route::resource('detalles-generales', App\Http\Controllers\DetallesGeneraleController::class);

    Route::resource('pedidos', App\Http\Controllers\PedidoController::class);

    Route::resource('estados-pedidos', App\Http\Controllers\EstadosPedidoController::class);

    Route::resource('habilitaciones-accesos', App\Http\Controllers\HabilitacionesAccesoController::class);

});

Auth::routes();

    
    Route::get('/nuevo', [App\Http\Controllers\NuevoPedidoController::class, 'newOrder'])->name('newOrder');

    Route::post('/nuevo/paso2', [App\Http\Controllers\NuevoPedidoController::class, 'paso2'])->name('newPaso2');

    Route::post('/nuevo/paso3', [App\Http\Controllers\NuevoPedidoController::class, 'paso3'])->name('newPaso3');

    Route::post('/nuevo/paso4', [App\Http\Controllers\NuevoPedidoController::class, 'paso4'])->name('newPaso4');

    Route::post('/nuevo/paso5', [App\Http\Controllers\NuevoPedidoController::class, 'paso5'])->name('newPaso5');

    Route::post('/nuevo/paso6', [App\Http\Controllers\NuevoPedidoController::class, 'paso6'])->name('newPaso6');

    Route::post('/nuevo/paso7', [App\Http\Controllers\NuevoPedidoController::class, 'paso7'])->name('newPaso7');

    Route::post('/nuevo/paso8', [App\Http\Controllers\NuevoPedidoController::class, 'paso8'])->name('newPaso8');

    Route::post('/nuevo/paso9', [App\Http\Controllers\NuevoPedidoController::class, 'paso9'])->name('newPaso9');

    Route::post('/nuevo/paso10', [App\Http\Controllers\NuevoPedidoController::class, 'paso10'])->name('newPaso10');