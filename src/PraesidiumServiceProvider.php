<?php

namespace UNK\Praesidium;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Auth\Access\Authorizable;

class PraesidiumServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->publishResources();
        $this->loadMigrations();
        $this->registerGates();
    }

    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/praesidium.php', 'praesidium'
        );

        $this->app->bind('praesidium', function() {
            return new Praesidium();
        });
    }

    protected function publishResources()
    {
        // Publicando las configuraciones
        $this->publishes([
            __DIR__.'/../config/praesidium.php' => config_path('praesidium.php'),
        ], 'config');

        // Publicando las migraciones
        $this->publishes([
            __DIR__.'/database/migrations/' => database_path('migrations'),
        ], 'migrations');

        // Publicando las Seeds
        $this->publishes([
            __DIR__ . '/database/seeders/PraesidiumSeeder.php' => database_path('seeders/PraesidiumSeeder.php'),
        ], 'seeds');
    }

    protected function loadMigrations()
    {
        if (config('permssions.migrate', true)) {
            $this->loadMigrationsFrom(__DIR__.'/../migrations');
        }
    }

    public function registerGates()
    {
        Gate::define('havePermission', function(Authorizable $user, $permission){
            $user = User::findOrFail($user->id);
            return $user->havePermission($permission);
        });

        Gate::define('haveRole', function(Authorizable $user, $role){
            $user = User::findOrFail($user->id);
            return $user->haveRole($role);
        });
    }
}
