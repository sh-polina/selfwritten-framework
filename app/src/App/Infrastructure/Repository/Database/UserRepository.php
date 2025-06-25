<?php

declare(strict_types=1);

namespace Palina\App\Infrastructure\Repository\Database;

use Palina\App\Domain\Entity\User;
use Palina\App\Domain\Ports\Denormalizer\User\UserDenormalizerInterface;
use Palina\App\Domain\Ports\Filter\FilterBuilderInterface;
use Palina\App\Domain\Ports\Hydrator\User\UserHydratorInterface;
use Palina\App\Domain\Ports\Repository\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function __construct(
        private \PDO $pdo,
        private UserHydratorInterface $userHydrator,
        private UserDenormalizerInterface $userDenormaliser,
    ) {
    }

    public function findAllByFilter(FilterBuilderInterface $filterBuilder): \Generator
    {
        $query = 'SELECT * FROM users';

        if ($filterBuilder->getConditions()) {
            $query .= ' WHERE '.implode(' AND ', $filterBuilder->getConditions());
        }

        $statement = $this->pdo->prepare($query);
        $statement->execute($filterBuilder->getParams());
        while ($row = $statement->fetch(\PDO::FETCH_ASSOC)) {
            yield $this->userDenormaliser->denormalize($row);
        }
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
