<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ExceptionsExtending extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except('App\Exceptions\Handler')
            ->that(new ResideInOneOfTheseNamespaces('App\Exceptions'))
            ->should(new Extend('Exception'))
            ->because('we use Laravel framework!');
    }

    public static function path(): string
    {
        return 'app/Exceptions';
    }
}
