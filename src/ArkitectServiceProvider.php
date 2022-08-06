<?php

namespace Mortexa\LaravelArkitect;

use Illuminate\Support\ServiceProvider;
use Mortexa\LaravelArkitect\Console\MakeArkitectRule;
use Mortexa\LaravelArkitect\Console\TestArchitecture;

class ArkitectServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/config.php', 'arkitect');
    }

    public function boot(): void
    {
        $this->registerCommands();

        if (app()->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/config.php' => config_path('arkitect.php'),
            ], 'config');
        }
    }

    private function registerCommands(): void
    {
        if (app()->runningInConsole()) {
            $this->commands([
                TestArchitecture::class,
                MakeArkitectRule::class,
            ]);
        }
    }
}
