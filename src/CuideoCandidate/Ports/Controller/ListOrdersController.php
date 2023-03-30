<?php

namespace App\CuideoCandidate\Ports\Controller;

use App\CuideoCandidate\Application\Find\ListOrdersQuery;
use App\CuideoCandidate\Infrastructure\Serializer\OrderTransformer;
use App\Shared\Infrastructure\Controller\BaseController;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\DataArraySerializer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


final class ListOrdersController extends BaseController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function list(Request $request): JsonResponse
    {
        $orders = $this->handleMessage(
            new ListOrdersQuery($request->query->all())
           //TODO: validate query params
        );

        $resource       = new Collection($orders, new OrderTransformer());
        $serializedData = (new Manager())->setSerializer(new DataArraySerializer())
                                         ->createData($resource)
                                         ->jsonSerialize();

        return $this->json($serializedData);
    }
}
