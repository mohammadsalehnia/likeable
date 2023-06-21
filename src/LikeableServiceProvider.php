<?php

namespace mohammadsalehnia\Likeable;

use Illuminate\Support\ServiceProvider;

class LikeableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->publishes([
            realpath(__DIR__ . '/../migrations') => database_path('migrations')
        ], 'migrations');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'Likeable');
        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/mohammadsalehnia/Likeable')
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/migrations');
    }
}
