<?php

namespace Palina\App\Infrastructure\Repository\Database;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Filter\FilterBuilder;
use Palina\App\Domain\Ports\UserDenormalizerInterface;
use Palina\App\Domain\Ports\UserHydratorInterface;
use Palina\App\Domain\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private \PDO                      $pdo,
        private UserHydratorInterface     $userHydrator,
        private UserDenormalizerInterface $userDenormaliser,
    ) {
    }

    public function filter(FilterBuilder $filterBuilder): array
    {
        $query = 'SELECT * FROM users';

        if ($filterBuilder->getConditions()) {
            $query .= ' WHERE '.implode(' AND ', $filterBuilder->getConditions());
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute($filterBuilder->getParams());

        $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
        $usersArray = [];

        foreach ($rows as $row) {
            $usersArray[] = $this->userDenormaliser->denormalize($row);
        }

        return $usersArray;
    }

    public function save(User $user): void
    {
        $query = 'INSERT INTO users 
            (country, city, is_active, gender, birth_date, salary, has_children, family_status, registration_date) 
            VALUES 
            (:country, :city, :is_active, :gender, :birth_date, :salary, :has_children, :family_status, :registration_date)';
        $statement = $this->pdo->prepare($query);
        $statement->execute($this->userHydrator->hydrate($user));
    }
}
