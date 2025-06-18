<?php

namespace Palina\App\Application\Denormalizer\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\UserDenormalizerInterface;

class UserDenormalizer implements UserDenormalizerInterface
{
    public function denormalize(array $data): User
    {
        return new User(
            $data['country'],
            $data['city'],
            $data['is_active'] ?? $data['isActive'],
            $data['gender'],
            $data['birth_date'] ?? $data['birthDate'],
            $data['salary'],
            $data['has_children'] ?? $data['hasChildren'],
            $data['family_status'] ?? $data['familyStatus'],
            $data['registration_date'] ?? $data['registrationDate'],
        );
    }
}
