<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Domain;

interface OrdersRepository
{
    public function save(Orders $order): void;

    public function findById(string $id): ?Orders;

    public function findByFilters(array $filters): array;
}
