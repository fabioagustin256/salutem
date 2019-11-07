<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::resourceVerbs([
            'index' => 'listar',
            'create' => 'crear',
            'store' => 'agregar',
            'show' => 'detalle',
            'edit' => 'editar',
            'update' => 'actualizar',
            'destroy' => 'eliminar',
        ]);
    }
}
