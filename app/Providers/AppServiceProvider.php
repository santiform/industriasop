<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cambiar la URL predeterminada para redirigir a los usuarios después de iniciar sesión
        Route::middleware(['auth'])->group(function () {
            Route::get('/home', function () {
                return redirect('/dashboard1'); // O cualquier ruta personalizada
            });
        });
    }
}
