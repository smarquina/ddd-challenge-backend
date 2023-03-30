<?php

namespace App\CuideoCandidate\Application\Create;

use App\CuideoCandidate\Domain\OrdersId;

class CreateOrderCommand
{
    private OrdersId $id;
    private string   $name;

    public function __construct(OrdersId $id, string $name)
    {
        $this->id   = $id;
        $this->name = $name;
    }

    /**
     * @return \App\CuideoCandidate\Domain\OrdersId
     */
    public function getId(): OrdersId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
