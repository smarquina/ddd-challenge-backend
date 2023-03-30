<?php

namespace App\Tests\CuideoCandidate\Unit;

use App\CuideoCandidate\Application\Find\ListOrdersQuery;
use App\CuideoCandidate\Application\Find\ListOrdersQueryHandler;
use App\CuideoCandidate\Domain\Orders;
use App\CuideoCandidate\Domain\OrdersId;
use App\CuideoCandidate\Domain\OrdersRepository;
use PHPUnit\Framework\TestCase;

class GetOrdersTest extends TestCase
{

    private function fakeOrderData(): array
    {
        return [
            Orders::create(OrdersId::generate(), 'test order 1'),
            Orders::create(OrdersId::generate(), 'test order 2'),
        ];
    }

    private function mockDBOrdersRepo()
    {
        $ordersRepository = $this->createMock(OrdersRepository::class);
        $ordersRepository->expects(self::once())
                         ->method('findByFilters')
                         ->willReturn($this->fakeOrderData());
        return $ordersRepository;
    }

    public function testOrdersQuery(): void
    {

        $queryHandler = new ListOrdersQueryHandler($this->mockDBOrdersRepo());
        $orders = $queryHandler->__invoke(new ListOrdersQuery([]));

        $this->assertCount(2, $orders);
        $this->assertEquals(($this->fakeOrderData()[0])->getName(), ($this->fakeOrderData()[0])->getName());

    }
}
