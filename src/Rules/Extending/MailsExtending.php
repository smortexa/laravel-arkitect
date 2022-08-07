<?php

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\ResideInOneOfTheseNamespaces;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class MailsExtending extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new ResideInOneOfTheseNamespaces('App\Mails'))
            ->should(new Extend('Illuminate\Mail\Mailable'))
            ->because('we use Laravel framework!');
    }

    public static function path(): string
    {
        return 'app/Mails';
    }
}
