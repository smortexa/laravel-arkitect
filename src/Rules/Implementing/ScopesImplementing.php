<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Implementing;

use Arkitect\Expression\ForClasses\Implement;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ScopesImplementing extends BaseRule implements RuleContract
{
    public static string $namespace = 'Models\Scopes';

    public static string $path = 'Models/Scopes';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Implement('Illuminate\Database\Eloquent\Scope'))
            ->because('we use Laravel framework!');
    }
}
