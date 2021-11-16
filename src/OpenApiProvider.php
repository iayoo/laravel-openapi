<?php
namespace Iayoo\OpenApi;

use Illuminate\Support\ServiceProvider;

class OpenApiProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Migrations
//        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $path = realpath(__DIR__.'/../config/open_api.php');

        $this->publishes([$path => config_path('open_api.php')]);
//        $this->mergeConfigFrom($path, 'open_api');

        // Views
//        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'analytics');
    }

}