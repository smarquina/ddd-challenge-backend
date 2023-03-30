<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Ports\Console;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GetOrdersConsoleCommand extends Command
{
    protected static $defaultName = 'app:sunshine';
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Good morning!');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Waking up the sun' . PHP_EOL);

    }
}