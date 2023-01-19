<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Naming;

use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class SeedersNaming extends BaseRule implements RuleContract
{
    public static string $namespace = 'Database\Seeders';

    public static string $path = 'database/seeders';

    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces(static::namespace()))
            ->should(new HaveNameMatching('*Seeder'))
            ->because('It\'s a Laravel naming convention');
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
        if (in_array(static::$rootPath, ['app/', 'database/factories/'])) {
            return '';
        }

        if ('database/seeders/' === static::$rootPath) {
            return static::$path;
        }

        if (str_contains(static::$rootPath, 'src/')) {
            return str_replace('src/', '', static::$rootPath).static::$path;
        }

        return parent::path();
    }
}
