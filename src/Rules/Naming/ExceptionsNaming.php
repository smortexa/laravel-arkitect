<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Naming;

use Arkitect\Expression\ForClasses\MatchOneOfTheseNames;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ExceptionsNaming extends BaseRule implements RuleContract
{
    public static string $namespace = 'Exceptions';

    public static string $path = 'Exceptions';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new MatchOneOfTheseNames(['Exception', 'Handler']))
            ->because('It\'s a Laravel naming convention');
    }
}
