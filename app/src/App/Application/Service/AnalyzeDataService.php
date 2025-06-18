<?php

namespace Palina\App\Application\Service;

use Palina\App\Domain\Ports\UserHydratorInterface;
use Palina\App\Domain\Ports\FilterBuilderInterface;
use Palina\App\Domain\Repository\UserRepositoryInterface;

class AnalyzeDataService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserHydratorInterface   $userHydrator,
        private FilterBuilderInterface  $filterBuilder,
    ) {
    }

    public function handle(array $getParams): array
    {
        $usersArray = [];

        $filter = $this->filterBuilder->applyFilters($getParams);

        $users = $this->userRepository->filter($filter);

        foreach ($users as $user) {
            $usersArray[] = $this->userHydrator->hydrate($user);
        }

        return $usersArray;
    }
}
