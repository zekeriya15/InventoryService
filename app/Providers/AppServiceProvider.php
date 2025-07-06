<?php

namespace App\Providers;

use App\Http\Middleware\JwtMiddleware;
use Illuminate\Support\ServiceProvider;

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
        // app()->routeMiddleware([
        //     'jwt.verify' => JwtMiddleware::class
        // ]);

        app()->router->aliasMiddleware('jwt.verify', JwtMiddleware::class);
    }
}
