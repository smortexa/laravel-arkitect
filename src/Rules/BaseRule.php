<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules;

use Arkitect\ClassSet;
use Illuminate\Support\Facades\File;
use Mortexa\LaravelArkitect\CreateApplication;

class BaseRule
{
    public static function classSet(): ClassSet
    {
        return ClassSet::fromDir(static::directory());
    }

    public static function directoryExists(): bool
    {
        return File::isDirectory(static::directory());
    }

    public static function directory(): string
    {
        return CreateApplication::app()->basePath(static::path());
    }
}
