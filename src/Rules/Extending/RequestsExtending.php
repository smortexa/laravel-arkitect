<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class RequestsExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Http\Requests';

    public static string $path = 'Http/Requests';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend('Illuminate\Foundation\Http\FormRequest'))
            ->because('we use Laravel framework!');
    }
}
