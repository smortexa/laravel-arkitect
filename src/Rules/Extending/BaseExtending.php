<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

abstract class BaseExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Console\Commands';

    public static string $path = 'Console/Commands';

    public static array $except = [];

    public static array $classNames = [];

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except(...static::$except)
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend(...static::$classNames))
            ->because(static::$reason);
    }
}
