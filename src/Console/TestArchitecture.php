<?php

namespace Mortexa\LaravelArkitect\Console;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class TestArchitecture extends Command
{
    protected $signature = 'test:arkitect {--stop-on-failure : The process will end immediately after the first violation.}
                                           {--debug : The verbose mode to see every parsed file.}';

    protected $description = 'Test the app architecture';

    public function handle(): int
    {
        $command = './vendor/bin/phparkitect check '.'--config='.__DIR__.'/../phparkitect.php';

        if ($this->option('debug')) {
            $command .= ' -v';
        }

        if ($this->option('stop-on-failure')) {
            $command .= ' --stop-on-failure';
        }

        Process::fromShellCommandline($command)
            ->setTty(true)
            ->run(fn ($type, $line) => $this->info($line));

        return static::SUCCESS;
    }
}
