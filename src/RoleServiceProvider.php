<?php

namespace Codersgarden\RoleAssign;

use Illuminate\Support\ServiceProvider;
use Codersgarden\RoleAssign\database\seeders\DatabaseSeeder;
use Illuminate\Support\Facades\Artisan;

class RoleServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {

        include_once __DIR__ . '/Helpers/custom_helpers.php';

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'roleassign');

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->runMigrations();
            $this->runSeeder();
        }
    }



    protected function runMigrations()
    {
        // Run migrations automatically
        Artisan::call('migrate', ['--force' => true]);
    }
    /**
     * Run the database seeder.
     */
    protected function runSeeder()
    {
        // Run the seeder automatically
        Artisan::call('db:seed', ['--class' => 'Codersgarden\\RoleAssign\\Database\\Seeders\\DatabaseSeeder']);
    }
}
