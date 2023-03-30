<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Application\Create;

use App\CuideoCandidate\Domain\OrdersRepository;
use App\CuideoCandidate\Domain\Orders;
use App\Shared\Infrastructure\Command\AbstractCommandHandler;

final class CreateOrderCommandHandler extends AbstractCommandHandler
{
    private OrdersRepository $ordersRepository;

    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    /**
     * @throws \App\Shared\Domain\Exception\InvalidUuidException
     */
    public function __invoke(CreateOrderCommand $command): void
    {
        $order = Orders::create($command->getId(), $command->getName());
        $this->ordersRepository->save($order);
    }
}
