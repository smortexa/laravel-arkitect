# Laravel Arkitect

[![Latest Stable Version](http://poser.pugx.org/mortexa/laravel-arkitect/v)](https://packagist.org/packages/mortexa/laravel-arkitect) [![Total Downloads](http://poser.pugx.org/mortexa/laravel-arkitect/downloads)](https://packagist.org/packages/mortexa/laravel-arkitect) [![Latest Unstable Version](http://poser.pugx.org/mortexa/laravel-arkitect/v/unstable)](https://packagist.org/packages/mortexa/laravel-arkitect) [![License](http://poser.pugx.org/mortexa/laravel-arkitect/license)](https://packagist.org/packages/mortexa/laravel-arkitect) [![PHP Version Require](http://poser.pugx.org/mortexa/laravel-arkitect/require/php)](https://packagist.org/packages/mortexa/laravel-arkitect)

Laravel Arkitect lets you test and enforce your architectural rules in your Laravel applications, and it's
a [PHPArkitect](https://github.com/phparkitect/arkitect) wrapper for Laravel. This package helps you to keep your app's
architecture clean and consistent.

## Installation

You can install the package via Composer:

```
composer require mortexa/laravel-arkitect --dev
```

## Usage

First, you should create your architectural rules by running the following Artisan command:

`php artisan make:arkitekt ControllersNaming`

By running the command, the `ControllersNaming.php` file will be created in your application's `tests/Architecture` directory like this:

```php
<?php

namespace Tests\Architecture;

use Arkitect\Rules\DSL\ArchRule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ControllersNaming extends BaseRule implements RuleContract
{
    /**
     * Define your architectural rule
     *
     * @link https://github.com/phparkitect/arkitect
     *
     * @return \Arkitect\Rules\DSL\ArchRule
     */
    public static function rule(): ArchRule
    {
        // TODO: Implement rule() method.
    }

    /**
     * Define the path related to your rule
     *
     * @example app/Http/Controllers
     *
     * @return string
     */
    public static function path(): string
    {
        // TODO: Implement path() method.
    }
}
```
Then, you must implement `rule()` and `path()` methods based on the following [example](#example).

And finally, you can run your tests by the following command:

`php artisan test:arkitect`

Done!

> If you want to stop checking command immediately after first violation, you can use `--stop-on-failure` option.

For all available rules, please take a look at the PHPArkitect repository: https://github.com/phparkitect/arkitect

### Default rules

Some opinionated rules are provided by the package and apply by default. These rules are about Laravel user-land structure. You are free to customize or ignore them entirely by [publishing config file](#configuration).

## Example

```php
<?php

namespace Tests\Architecture;

use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ControllersNaming extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces('App\Http\Controllers'))
            ->should(new HaveNameMatching('*Controller'))
            ->because('It\'s a Laravel naming convention');
    }

    public static function path(): string
    {
        return 'app/Http/Controllers';
    }
}
```

## Configuration

If you want to customize the default rules provided by the package, You can publish the Laravel Arkitect configuration file using the following Artisan command:

`php artisan vendor:publish --provider="Mortexa\LaravelArkitect\ArkitectServiceProvider" --tag="config"`

The `arkitect` configuration file will be placed in your application's `config` directory.

```php
// config/arkitect.php

<?php

use ...

return [
    'rules' => [
        'naming' => [
            ControllersNaming::class,
            ExceptionsNaming::class,
            NotificationsNaming::class,
            ObserversNaming::class,
            ProvidersNaming::class,
            RequestsNaming::class,
            ResourcesNaming::class,
            ChannelsNaming::class,
            SeedersNaming::class,
            PoliciesNaming::class,
            FactoriesNaming::class,
            ScopesNaming::class,
            BuildersNaming::class,
            ContractsNaming::class,
            RepositoriesNaming::class,
            MailsNaming::class,
        ],
        'extending' => [
            ControllersExtending::class,
            CommandsExtending::class,
            ExceptionsExtending::class,
            RequestsExtending::class,
            ResourcesExtending::class,
            ResourceCollectionsExtending::class,
            ModelsExtending::class,
            NotificationsExtending::class,
            ProvidersExtending::class,
            ViewsExtending::class,
            FactoriesExtending::class,
            SeedersExtending::class,
            MailsExtending::class,
        ],
        'implementing' => [
            RulesImplementing::class,
            CastsImplementing::class,
            ScopesImplementing::class,
            JobsImplementing::class,
        ],
    ],
];
```

## Contributing

Thank you for considering contributing! If you find an issue, or have a better way to do something, feel free to open an
issue, or a PR.

## Licence

This repository is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
