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
        $path = realpath(__DIR__.'/../config/open_api.php');
        $this->publishes([$path => config_path('open_api.php')]);
    }

}