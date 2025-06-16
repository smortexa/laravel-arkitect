<?php

declare(strict_types=1);

namespace Mortexa\LaravelArkitect\Rules\Extending;

class ModelsExtending extends BaseExtending
{
    public static string $namespace = 'Models';

    public static string $path = 'Models';

    public static array $except = [
        'App\Models\User',
        'App\Models\Admin',
        'App\Models\Client',
        'App\Models\Scopes',
    ];

    public static array $classNames = ['Illuminate\Database\Eloquent\Model'];
}
