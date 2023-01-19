<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ControllersExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Http\Controllers';

    public static string $path = 'Http/Controllers';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except('App\Http\Controllers\Controller')
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend('App\Http\Controllers\Controller'))
            ->because('we use Laravel framework!');
    }
}
