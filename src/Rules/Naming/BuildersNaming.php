<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Naming;

use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class BuildersNaming extends BaseRule implements RuleContract
{
    public static string $namespace = 'Builders';

    public static string $path = 'Builders';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new HaveNameMatching('*Builder'))
            ->because('It\'s a Laravel naming convention');
    }
}
