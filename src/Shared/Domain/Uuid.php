<?php

namespace App\Shared\Domain;

use App\Shared\Domain\Exception\InvalidUuidException;
use Ramsey\Uuid\Uuid as VendorUuid;

abstract class Uuid
{
    protected string $uuid;

    /**
     * @throws \App\Shared\Domain\Exception\InvalidUuidException
     */
    public function __construct(string $uuid)
    {
        $this->validateUuid($uuid);

        $this->uuid = $uuid;
    }

    public function getValue(): string
    {
        return $this->uuid;
    }


    public static function generate(): self
    {
        $class = static::class;
        return new $class(VendorUuid::uuid4()->toString());
    }

    /**
     * @throws \App\Shared\Domain\Exception\InvalidUuidException
     */
    private function validateUuid($id): void
    {
        if (!VendorUuid::isValid($id)) {
            throw new InvalidUuidException("UUID {$this->uuid} not valid");
        }
    }
}
