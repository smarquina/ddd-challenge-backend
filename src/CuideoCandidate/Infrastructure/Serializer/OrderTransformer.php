<?php

declare(strict_types=1);

namespace App\CuideoCandidate\Infrastructure\Serializer;

use App\CuideoCandidate\Domain\Orders;
use League\Fractal\TransformerAbstract;

final class OrderTransformer extends TransformerAbstract
{
    public function transform(Orders $order): array
    {
        return [
            'id'   => $order->getId()->getValue(),
            'name' => $order->getName(),
        ];
    }
}
