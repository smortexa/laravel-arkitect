<?php

declare(strict_types=1);

use Arkitect\CLI\Config;
use Mortexa\LaravelArkitect\CreateApplication;

return static function (Config $config): void {
    $package_config = CreateApplication::app()['config']['arkitect'];

    $rules = [];

    if ($package_config['types']['naming']) {
        $rules = array_merge($rules, $package_config['rules']['naming']);
    }

    foreach (glob(CreateApplication::app()->path('Arkitect/*.php')) as $file) {
        $class = basename($file, '.php');
        $rules[] = 'App\\Arkitect\\'.$class;
    }

    foreach ($rules as $rule) {
        if ($rule::directoryExists()) {
            $config->add($rule::classSet(), $rule::rule());
        }
    }
};
