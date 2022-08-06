<?php

namespace Mortexa\LaravelArkitect\Console;

use Illuminate\Console\GeneratorCommand;

class MakeArkitectRule extends GeneratorCommand
{
    protected $name = 'make:arkitect';

    protected $description = 'Create a new Arkitect rule class';

    protected $type = 'Arkitect';

    protected function getStub()
    {
        return __DIR__.'/stubs/arkitect.php.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Arkitect';
    }

    public function handle()
    {
        parent::handle();
    }
}
