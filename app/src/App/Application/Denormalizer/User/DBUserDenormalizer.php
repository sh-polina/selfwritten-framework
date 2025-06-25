<?php

declare(strict_types=1);

namespace Palina\App\Application\Denormalizer\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\Denormalizer\User\UserDenormalizerInterface;

class DBUserDenormalizer implements UserDenormalizerInterface
{
    public function denormalize(array $data): User
    {
        return new User(
            id: $data['id'],
            country: $data['country'],
            city: $data['city'],
            isActive: $data['is_active'],
            gender: $data['gender'],
            birthDate: new \DateTimeImmutable($data['birth_date']),
            salary: (float) $data['salary'],
            hasChildren: $data['has_children'],
            familyStatus: $data['family_status'],
            registrationDate: new \DateTimeImmutable($data['registration_date']),
        );
    }
}
