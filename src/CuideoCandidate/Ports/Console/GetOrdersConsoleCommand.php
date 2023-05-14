<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Ports\Console;

use App\CuideoCandidate\Application\Find\ListOrdersQuery;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

final class GetOrdersConsoleCommand extends Command
{
    protected static $defaultName = 'cuideo:list:orders';

    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('List BD orders');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $orders  = $this->handle(
            new ListOrdersQuery([])
        );
        $nOrders = count($orders);

        $output->writeln('+-------------------- Orders ----------+---------+');
        $output->writeln('| id                                   | name    |');
        foreach ($orders as $order) {
            $output->writeln("| {$order->getId()->getValue()} | {$order->getName()} |");
        }
        $output->writeln("+--------------- total orders: {$nOrders} ------+---------+");

    }
}
