<?php

namespace Achay\Patpay;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

/**
 * This class represents a service provider.
 *
 */
class PatpayPackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
    }

    /**
     * Register the services provided by the provider.
     *
     * @return array
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        });
    }

    /**
     * Get the configuration for the package routes.
     *
     * @return array
     */
    protected function routeConfiguration()
    {
        return [
            'prefix' => 'patpay',
        ];
    }
}