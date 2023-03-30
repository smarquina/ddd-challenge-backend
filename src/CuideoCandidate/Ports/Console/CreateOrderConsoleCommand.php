<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Ports\Console;

use App\CuideoCandidate\Application\Create\CreateOrderCommand;
use App\CuideoCandidate\Domain\OrdersId;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class CreateOrderConsoleCommand extends Command
{
    protected static $defaultName = 'cuideo:create:order';

    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Create new order')
             ->addArgument('name', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $productCommand = new CreateOrderCommand(
            OrdersId::generate(),
            $input->getArgument('name'),
        );

        $this->handle($productCommand);

        $output->writeln(
            "New order {$productCommand->getName()} stored ({$productCommand->getId()->getValue()})"
        );
    }
}
