<?php

namespace Codersgarden\RoleAssign;

use Illuminate\Support\ServiceProvider;
use Codersgarden\RoleAssign\database\seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Artisan;

class RoleServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/custom.php', 'lexoffice');
    }

    public function boot()
    {
          
        $this->publishes([
            __DIR__ . '/config/custom.php' => config_path('custom.php'),
        ], 'config');
         

        include_once __DIR__ . '/Helpers/custom_helpers.php';

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'roleassign');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

    
    }

}


