<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules;

use Arkitect\ClassSet;
use Illuminate\Support\Facades\File;
use Mortexa\LaravelArkitect\CreateApplication;

class BaseRule
{
    public static string $rootNamespace = 'App\\';

    public static string $rootPath = 'app/';

    public static function classSet(): ClassSet
    {
        return ClassSet::fromDir(static::directory());
    }

    public static function directoryExists(): bool
    {
        return File::isDirectory(static::directory());
    }

    public static function isValid(): bool
    {
        return static::directoryExists() && filled(static::path());
    }

    public static function directory(): string
    {
        return CreateApplication::app()->basePath(static::path());
    }

    protected static function namespace(): string
    {
        return static::$rootNamespace.static::$namespace;
    }

    public static function path(): string
    {
        return static::$rootPath.static::$path;
    }
}
