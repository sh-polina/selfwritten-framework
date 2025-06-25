<?php

declare(strict_types=1);

namespace Palina\App\Domain\Ports\Hydrator\User;

use Palina\App\Domain\Entity\User;

interface UserHydratorInterface
{
    public function hydrate(User $user): array;
}
