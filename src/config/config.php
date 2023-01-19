<?php

declare(strict_types=1);

use Mortexa\LaravelArkitect\Rules\Extending\CommandsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ControllersExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ExceptionsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\FactoriesExtending;
use Mortexa\LaravelArkitect\Rules\Extending\MailsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ModelsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\NotificationsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ProvidersExtending;
use Mortexa\LaravelArkitect\Rules\Extending\RequestsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ResourceCollectionsExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ResourcesExtending;
use Mortexa\LaravelArkitect\Rules\Extending\SeedersExtending;
use Mortexa\LaravelArkitect\Rules\Extending\ViewsExtending;
use Mortexa\LaravelArkitect\Rules\Implementing\CastsImplementing;
use Mortexa\LaravelArkitect\Rules\Implementing\JobsImplementing;
use Mortexa\LaravelArkitect\Rules\Implementing\RulesImplementing;
use Mortexa\LaravelArkitect\Rules\Implementing\ScopesImplementing;
use Mortexa\LaravelArkitect\Rules\Naming\BuildersNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ChannelsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ContractsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ControllersNaming;
use Mortexa\LaravelArkitect\Rules\Naming\ExceptionsNaming;
use Mortexa\LaravelArkitect\Rules\Naming\FactoriesNaming;
use Mortexa\LaravelArkitect\Rules\Naming\MailsNaming;
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
