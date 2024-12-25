<?php

namespace Codersgarden\RoleAssign;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

class RoleServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/custom.php', 'custom');
    }

    public function boot()
    {

        $this->serveStaticFile('style-css', '/../resources/assets/css/style.css');
        $this->serveStaticFile('back-icon', '/../resources/images/back.png');
        $this->serveStaticFile('setting-icon', '/../resources/images/setting.png');
        $this->serveStaticFile('delete-icon', '/../resources/images/delete.png');
        $this->serveStaticFile('edit-icon', '/../resources/images/pencile.png');
        $this->serveStaticFile('roleassign-logo', '/../resources/images/LOGO.png');
        $this->serveStaticFile('pervious-icon', '/../resources/images/Vector.png');


        $this->publishes([
            __DIR__ . '/config/custom.php' => config_path('custom.php'),
        ], 'config');


        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        }

        include_once __DIR__ . '/Helpers/custom_helpers.php';

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/views', 'roleassign');


        if ($this->app->runningInConsole() && !Config::get('custom')) {
            Artisan::call('vendor:publish', [
                '--provider' => 'Codersgarden\RoleAssign\RoleServiceProvider',
                '--tag' => 'config',
            ]);
        }
    }

    protected function serveStaticFile($routeName, $filePath)
    {
        Route::get($routeName, function () use ($filePath) {
            $path = __DIR__ . $filePath;
            return response()->file($path);
        });
    }
}
