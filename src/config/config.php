<?php

use Mortexa\LaravelArkitect\Rules\Naming\BuildersNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ChannelsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ContractsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ControllersNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ExceptionsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\FactoriesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\NotificationsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ObserversNaming;
use Mortexa\LaravelArkitect\Rules\Naming\PoliciesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ProvidersNaming;
use Mortexa\LaravelArkitect\Rules\Naming\RepositoriesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\RequestsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ResourcesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ScopesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\SeedersNaming;

return [
    'types' => [
        'naming' => true,
    ],

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
        ],
    ],
];
