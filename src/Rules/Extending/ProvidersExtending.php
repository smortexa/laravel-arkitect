<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ProvidersExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Providers';

    public static string $path = 'Providers';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except(
                'App\Providers\AuthServiceProvider',
                'App\Providers\EventServiceProvider',
                'App\Providers\RouteServiceProvider',
                'App\Providers\HorizonServiceProvider',
            )
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend('Illuminate\Support\ServiceProvider'))
            ->because('we use Laravel framework!');
    }
}
