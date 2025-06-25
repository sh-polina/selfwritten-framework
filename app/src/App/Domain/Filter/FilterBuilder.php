<?php

declare(strict_types=1);

namespace Palina\App\Domain\Filter;

use Palina\App\Domain\Ports\Filter\FilterBuilderInterface;

class FilterBuilder implements FilterBuilderInterface
{
    private array $params = [];
    private array $conditions = [];

    public function createFilterQuery(array $getParams): FilterBuilder
    {
        $filters = [
            'country' => '=',
            'city' => '=',
            'is_active' => ['true' => 1, 'false' => 0],
            'gender' => '=',
            'family_status' => '=',
            'has_children' => ['true' => 1, 'false' => 0],
        ];

        $betweenFilters = [
            'birth_date' => ['birth_date_from', 'birth_date_to'],
            'salary' => ['salary_from', 'salary_to'],
            'registration_date' => ['registration_date_from', 'registration_date_to'],
        ];

        foreach ($filters as $key => $rule) {
            if (isset($getParams[$key]) && '' !== $getParams[$key]) {
                if (is_array($rule)) {
                    if (in_array($getParams[$key], ['true', 'false'], true)) {
                        $this->params[":$key"] = $rule[$getParams[$key]];
                        $this->conditions[] = "$key = :$key";
                    }
                } else {
                    $this->conditions[] = "$key $rule :$key";
                    $this->params[":$key"] = $getParams[$key];
                }
            }
        }

        foreach ($betweenFilters as $column => [$fromKey, $toKey]) {
            if (!empty($getParams[$fromKey]) && !empty($getParams[$toKey])) {
                $this->conditions[] = "$column BETWEEN :$fromKey AND :$toKey";
                $this->params[":$fromKey"] = $getParams[$fromKey];
                $this->params[":$toKey"] = $getParams[$toKey];
            }
        }

        return $this;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getConditions(): array
    {
        return $this->conditions;
    }
}
