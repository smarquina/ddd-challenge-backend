<?php

namespace App\CuideoCandidate\Application\Find;

class ListOrdersQuery
{
    private array $filters;

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
