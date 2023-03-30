<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Application\Find;

use App\CuideoCandidate\Domain\OrdersRepository;
use App\Shared\Infrastructure\Command\AbstractCommandHandler;

final class ListOrdersQueryHandler extends AbstractCommandHandler
{
    private OrdersRepository $ordersRepository;

    public function __construct(OrdersRepository $ordersRepository)
    {
        $this->ordersRepository = $ordersRepository;
    }

    public function __invoke(ListOrdersQuery $query): array
    {
        return $this->ordersRepository->findByFilters($query->getFilters());
    }
}
