<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

class ControllersExtending extends BaseExtending
{
    public static string $namespace = 'Http\Controllers';

    public static string $path = 'Http/Controllers';

    public static array $except = ['App\Http\Controllers\Controller'];

    public static array $classNames = ['App\Http\Controllers\Controller'];
}
