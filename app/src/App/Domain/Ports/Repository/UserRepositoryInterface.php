<?php

declare(strict_types=1);

namespace Palina\App\Domain\Ports\Repository;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\Filter\FilterBuilderInterface;

interface UserRepositoryInterface
{
    public function findAllByFilter(FilterBuilderInterface $filterBuilder): \Generator;

    public function save(User $user): void;
}
