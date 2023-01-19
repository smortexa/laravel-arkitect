<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Implementing;

use Arkitect\Expression\ForClasses\Implement;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class CastsImplementing extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces('App\Casts'))
            ->should(new Implement('Illuminate\Contracts\Database\Eloquent\CastsAttributes'))
            ->because('we use Laravel framework!');
    }

    public static function path(): string
    {
        return 'app/Casts';
    }
}
