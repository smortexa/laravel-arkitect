<?php

namespace Mortexa\LaravelArkitect;

use Illuminate\Support\Arr;

class RuleLoader
{
    public static function user(): array
    {
        $rules = [];

        foreach (glob(base_path('tests/Architecture/*.php')) as $file) {
            $class = basename($file, '.php');
            $rules[] = 'Tests\\Architecture\\'.$class;
        }

        return $rules;
    }

    public static function package(): array
    {
        $package_config = CreateApplication::app()->make('config')['arkitect'];

        return Arr::flatten($package_config['rules']);
    }

    public static function all(): array
    {
        return array_merge(static::package(), static::user());
    }
}
