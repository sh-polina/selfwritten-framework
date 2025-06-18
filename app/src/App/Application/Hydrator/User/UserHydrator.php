<?php

namespace Palina\App\Application\Hydrator\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\UserHydratorInterface;

class UserHydrator implements UserHydratorInterface
{
    public function hydrate(User $user): array
    {
        return [
            'country' => $user->getCountry(),
            'city' => $user->getCity(),
            'is_active' => $user->isActive(),
            'gender' => $user->getGender(),
            'birth_date' => $user->getBirthDate(),
            'salary' => $user->getSalary(),
            'has_children' => $user->hasChildren(),
            'family_status' => $user->getFamilyStatus(),
            'registration_date' => $user->getRegistrationDate(),
        ];
    }
}
