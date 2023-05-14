<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Infrastructure\Persistence\Doctrine\Repository;

use App\CuideoCandidate\Domain\Orders;
use App\CuideoCandidate\Domain\OrdersRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\Repository\DoctrineRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrineOrdersRepository extends DoctrineRepository implements OrdersRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orders::class);
    }
    public function save(Orders $order): void
    {
        $this->persist($order);
    }

    public function findById(string $id): ?Orders
    {
        return $this->find($id);
    }

    public function findByFilters(array $filters): array {
        //TODO: use criteria pattern filters
        return $this->findBy($filters);
    }
}
