<?php

namespace Palina\App\Application\Denormalizer\User;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\UserDenormalizerInterface;

class CsvUserDenormalizer implements UserDenormalizerInterface
{
    public function denormalize(array $data): User
    {
        return new User(
        $data['country'],
        $data['city'],
        $data['isActive'],
        $data['gender'],
        $data['birthDate'],
        $data['salary'],
        $data['hasChildren'],
        $data['familyStatus'],
        $data['registrationDate'],
    );
    }
}