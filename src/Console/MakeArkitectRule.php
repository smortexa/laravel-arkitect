<?php

namespace Mortexa\LaravelArkitect\Console;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeArkitectRule extends GeneratorCommand
{
    protected $name = 'make:arkitect';

    protected $description = 'Create a new Arkitect rule class';

    protected $type = 'Arkitect';

    protected function getStub(): string
    {
        return __DIR__.'/stubs/arkitect.php.stub';
    }

    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return base_path('tests').str_replace('\\', '/', $name).'.php';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'\Architecture';
    }

    protected function rootNamespace(): string
    {
        return 'Tests';
    }
}
