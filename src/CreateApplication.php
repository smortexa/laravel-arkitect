<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;

class CreateApplication
{
    public static Application|null $app = null;

    public static function app()
    {
        if (null !== static::$app) {
            return static::$app;
        }

        $app = require './bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        static::$app = $app;

        return $app;
    }
}
