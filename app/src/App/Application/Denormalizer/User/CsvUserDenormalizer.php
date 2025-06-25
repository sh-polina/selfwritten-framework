<?php

declare(strict_types=1);

namespace Palina\App\Application\Denormalizer\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\Denormalizer\User\UserDenormalizerInterface;

class CsvUserDenormalizer implements UserDenormalizerInterface
{
    public function denormalize(array $data): User
    {
        return new User(
            country: $data['country'],
            city: $data['city'],
            isActive: (bool)$data['isActive'],
            gender: $data['gender'],
            birthDate: new \DateTimeImmutable($data['birthDate']),
            salary: (float)$data['salary'],
            hasChildren: (bool)$data['hasChildren'],
            familyStatus: $data['familyStatus'],
            registrationDate: new \DateTimeImmutable($data['registrationDate']),
        );
    }
}
