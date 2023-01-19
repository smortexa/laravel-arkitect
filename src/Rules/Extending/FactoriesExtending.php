<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class FactoriesExtending extends BaseRule implements RuleContract
{
    public static string $namespace = 'Database\Factories';

    public static string $path = 'database/factories';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new Extend('Illuminate\Database\Eloquent\Factories\Factory'))
            ->because('we use Laravel framework!');
    }

    public static function namespace(): string
    {
        if (static::$rootNamespace === static::$namespace.'\\') {
            return static::$namespace;
        }

        return parent::namespace();
    }

    public static function path(): string
    {
        if (in_array(static::$rootPath, ['app/', 'database/seeders/'])) {
            return '';
        }

        if ('database/factories/' === static::$rootPath) {
            return static::$path;
        }

        if (str_contains(static::$rootPath, 'src/')) {
            return str_replace('src/', '', static::$rootPath).static::$path;
        }

        return parent::path();
    }
}
