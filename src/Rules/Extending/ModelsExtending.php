<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ModelsExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Models';

    public static string $path = 'Models';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->except(
                'App\Models\User',
                'App\Models\Admin',
                'App\Models\Client',
                'App\Models\Scopes'
            )
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend('Illuminate\Database\Eloquent\Model'))
            ->because('we use Laravel framework!');
    }
}
