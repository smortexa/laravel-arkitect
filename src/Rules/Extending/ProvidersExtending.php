<?php

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ProvidersExtending extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except('App\Providers\(Auth|Event|Route|Horizon)ServiceProvider')
            ->that(new ResideInOneOfTheseNamespaces('App\Providers'))
            ->should(new Extend('Illuminate\Support\ServiceProvider'))
            ->because('we use Laravel framework!');
    }

    public static function path(): string
    {
        return 'app/Providers';
    }
}
