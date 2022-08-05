<?php

namespace Mortexa\LaravelArkitect\Tests;

use Mortexa\LaravelArkitect\ArkitectServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            ArkitectServiceProvider::class,
        ];
    }
}
