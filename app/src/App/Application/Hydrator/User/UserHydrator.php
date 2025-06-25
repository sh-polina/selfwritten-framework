<?php

declare(strict_types=1);

namespace Palina\App\Application\Hydrator\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\Hydrator\User\UserHydratorInterface;

class UserHydrator implements UserHydratorInterface
{
    public function hydrate(User $user): array
    {
        return [
            'country' => $user->getCountry(),
            'city' => $user->getCity(),
            'is_active' => $user->isActive(),
            'gender' => $user->getGender(),
            'birth_date' => $user->getBirthDate()?->format('Y-m-d'),
            'salary' => $user->getSalary(),
            'has_children' => $user->hasChildren(),
            'family_status' => $user->getFamilyStatus(),
            'registration_date' => $user->getRegistrationDate()?->format('Y-m-d'),
        ];
    }
}
