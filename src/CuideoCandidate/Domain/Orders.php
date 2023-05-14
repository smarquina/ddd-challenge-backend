<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Domain;

final class Orders
{
    private string $id;
    private string $name;

    /**
     * @throws \App\Shared\Domain\Exception\InvalidUuidException
     */
    public function __construct(string $id, string $name)
    {
        $this->name = $name;
        $this->id   = (new OrdersId($id))->getValue();
    }

    /**
     * @throws \App\Shared\Domain\Exception\InvalidUuidException
     */
    public static function create(OrdersId $id, string $name): self
    {
        return new self($id->getValue(), $name);
    }

    /**
     * @return \App\CuideoCandidate\Domain\OrdersId
     */
    public function getId(): OrdersId
    {
        return new OrdersId($this->id);
    }

    /**
     * @param \App\CuideoCandidate\Domain\OrdersId $id
     * @return Orders
     */
    public function setId(OrdersId $id): Orders
    {
        $this->id = $id->getValue();

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Orders
     */
    public function setName(string $name): Orders
    {
        $this->name = $name;

        return $this;
    }


}
