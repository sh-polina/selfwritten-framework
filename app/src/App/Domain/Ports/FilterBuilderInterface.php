<?php

namespace Palina\App\Domain\Ports;

interface FilterBuilderInterface
{
    public function applyFilters(array $getParams): self;

    public function getParams(): array;

    public function getConditions(): array;
}
