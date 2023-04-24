<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->setName('app:hello')
            ->setDescription('The hello world.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        echo 'Hello world.';

        return 1;
    }
}
