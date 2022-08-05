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

        // $this->doOtherOperations();
    }

    protected function doOtherOperations()
    {
        // Get the fully qualified class name (FQN)
        $class = $this->qualifyClass($this->getNameInput());

        // get the destination path, based on the default namespace
        $path = $this->getPath($class);

        $content = file_get_contents($path);

        // Update the file content with additional data (regular expressions)

        file_put_contents($path, $content);
    }
}
