<?php

declare(strict_types=1);

use Arkitect\CLI\Config;
use Illuminate\Support\Arr;
use Mortexa\LaravelArkitect\CreateApplication;

return static function (Config $config): void {
    $app = CreateApplication::app();

    $package_config = $app['config']['arkitect'];

    $rules = [];

    $rules = array_merge($rules, Arr::flatten($package_config['rules']));

    foreach (glob($app->path('Arkitect/*.php')) as $file) {
        $class = basename($file, '.php');
        $rules[] = 'App\\Arkitect\\'.$class;
    }

    foreach ($rules as $rule) {
        if ($rule::directoryExists()) {
            $config->add($rule::classSet(), $rule::rule());
        }
    }
};
