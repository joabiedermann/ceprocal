<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\\Http\\Controllers';

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));

            Route::middleware('guest')
            ->namespace($this->namespace)
            ->group(base_path('routes/public.php'));
        });
    }
}
