<?php

declare(strict_types=1);

namespace Palina\App\Domain\Ports\Denormalizer\User;

use Palina\App\Domain\Entity\User;

interface UserDenormalizerInterface
{
    public function denormalize(array $data): User;
}
