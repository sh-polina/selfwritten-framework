<?php

namespace Palina\App\Domain\Ports;

use Palina\App\Domain\Entity\User;

interface UserHydratorInterface
{
    public function hydrate(User $user): array;
}
