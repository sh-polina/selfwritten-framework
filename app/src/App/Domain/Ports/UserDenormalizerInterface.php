<?php

namespace Palina\App\Domain\Ports;

use Palina\App\Domain\Entity\User;

interface UserDenormalizerInterface
{
    public function denormalize(array $data): User;
}
