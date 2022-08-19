<?php

declare(strict_types=1);

use Arkitect\CLI\Config;
use Mortexa\LaravelArkitect\RuleLoader;

return static function (Config $config): void {
    $rules = RuleLoader::all();

    foreach ($rules as $rule) {
        if ($rule::directoryExists()) {
            $config->add($rule::classSet(), $rule::rule());
        }
    }
};
