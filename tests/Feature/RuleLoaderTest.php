<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Mortexa\LaravelArkitect\RuleLoader;
use function PHPUnit\Framework\assertEqualsCanonicalizing;

it('loads user\'s rules', function (): void {
    $fooClass = base_path('tests/Architecture/Foo.php');
    $barClass = base_path('tests/Architecture/Bar.php');

    if (File::exists($fooClass)) {
        unlink($fooClass);
    }

    if (File::exists($barClass)) {
        unlink($barClass);
    }

    Artisan::call('make:arkitect Foo');
    Artisan::call('make:arkitect Bar');

    $rules = RuleLoader::user();

    assertEqualsCanonicalizing(['Tests\\Architecture\\Foo', 'Tests\\Architecture\\Bar'], $rules);
});
