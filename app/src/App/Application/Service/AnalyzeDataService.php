<?php

declare(strict_types=1);

namespace Palina\App\Application\Service;

use Palina\App\Domain\Ports\Filter\FilterBuilderInterface;
use Palina\App\Domain\Ports\Hydrator\User\UserHydratorInterface;
use Palina\App\Domain\Ports\Repository\UserRepositoryInterface;

class AnalyzeDataService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserHydratorInterface $userHydrator,
        private FilterBuilderInterface $filterBuilder,
    ) {
    }

    public function handle(array $getParams): \Generator
    {
        $filter = $this->filterBuilder->createFilterQuery($getParams);

        foreach ($this->userRepository->findAllByFilter($filter) as $user) {
            yield $this->userHydrator->hydrate($user);
        }
    }
}
