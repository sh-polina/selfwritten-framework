<?php

declare(strict_types=1);

namespace Palina\App\Domain\Ports\Filter;

interface FilterBuilderInterface
{
    public function createFilterQuery(array $getParams): self;

    public function getParams(): array;

    public function getConditions(): array;
}
