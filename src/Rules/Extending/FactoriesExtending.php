<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

class FactoriesExtending extends BaseExtending
{
    public static string $namespace = 'Database\Factories';

    public static string $path = 'database/factories';

    public static array $classNames = ['Illuminate\Database\Eloquent\Factories\Factory'];

    public static function namespace(): string
    {
        if (static::$rootNamespace === static::$namespace.'\\') {
            return static::$namespace;
        }

        return parent::namespace();
    }

    public static function path(): string
    {
        if (in_array(static::$rootPath, ['app/', 'database/seeders/'])) {
            return '';
        }

        if ('database/factories/' === static::$rootPath) {
            return static::$path;
        }

        if (str_contains(static::$rootPath, 'src/')) {
            return str_replace('src/', '', static::$rootPath).static::$path;
        }

        return parent::path();
    }
}
