<?php

declare(strict_types=1);

namespace App\Tests\CuideoCandidate\Unit;

use App\CuideoCandidate\Application\Create\CreateOrderCommand;
use App\CuideoCandidate\Application\Create\CreateOrderCommandHandler;
use App\CuideoCandidate\Domain\Orders;
use App\CuideoCandidate\Domain\OrdersId;
use App\CuideoCandidate\Domain\OrdersRepository;
use PHPUnit\Framework\TestCase;

class CreateOrderTest extends TestCase
{
    public function testHandle(): void
    {
        // Create a mock of the OrdersRepository interface
        $repository = $this->createMock(OrdersRepository::class);

        $command = new CreateOrderCommand(OrdersId::generate(), 'Test Order');
        $handler = new CreateOrderCommandHandler($repository);

        $repository->expects($this->once())
                   ->method('save')
                   ->with(
                       $this->callback(function ($order) use ($command) {
                           $this->assertInstanceOf(Orders::class, $order);
                           $this->assertEquals($order->getName(), $command->getName());
                           $this->assertTrue($order->getId()->equals($command->getId()));

                           return $order instanceof Orders &&
                                  $order->getId()->equals($command->getId()) &&
                                  $order->getName() === $command->getName();
                       })
                   );

        $handler($command);
    }
}
