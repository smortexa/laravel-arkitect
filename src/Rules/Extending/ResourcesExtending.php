<?php

namespace Mortexa\LaravelArkitect\Rules\Extending;

use Arkitect\Expression\ForClasses\Extend;
use Arkitect\Expression\ForClasses\HaveNameMatching;
use Arkitect\Rules\DSL\ArchRule;
use Arkitect\Rules\Rule;
use Mortexa\LaravelArkitect\Contracts\RuleContract;
use Mortexa\LaravelArkitect\Rules\BaseRule;

class ResourcesExtending extends BaseRule implements RuleContract
{
    public static function rule(): ArchRule
    {
        return Rule::allClasses()
            ->that(new HaveNameMatching('*Resource'))
            ->should(new Extend('Illuminate\Http\Resources\Json\JsonResource'))
            ->because('we use Laravel framework!');
    }

    public static function path(): string
    {
        return 'app/Http/Resources';
    }
}
