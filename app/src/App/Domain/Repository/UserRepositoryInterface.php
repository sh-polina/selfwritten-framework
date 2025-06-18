<?php

namespace Palina\App\Domain\Repository;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Filter\FilterBuilder;

interface UserRepositoryInterface
{
    public function filter(FilterBuilder $filterBuilder): array;

    public function save(User $user): void;
}
