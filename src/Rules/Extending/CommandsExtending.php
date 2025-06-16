<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

class CommandsExtending extends BaseExtending
{
    public static string $namespace = 'Console\Commands';

    public static string $path = 'Console/Commands';

    public static array $classNames = ['Illuminate\Console\Command'];
}
