<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

class ExceptionsExtending extends BaseExtending
{
    public static string $namespace = 'Exceptions';

    public static string $path = 'Exceptions';

    public static array $except = ['App\Exceptions\Handler'];

    public static array $classNames = ['Exception'];
}
