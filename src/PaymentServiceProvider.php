<?php

namespace Services\Payment;

use Services\Payment\GatewayProviders\CafebazaarProvider\CafebazaarConsole;
use Illuminate\Support\ServiceProvider;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-cafebazaar');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-cafebazaar');

        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        // Registering package commands.
        $this->commands([CafebazaarConsole::class]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/config/config.php', 'payment');
    }
}
