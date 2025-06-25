<?php

declare(strict_types=1);

namespace Palina\App\Application\Service;

use Palina\App\Domain\Ports\Denormalizer\User\UserDenormalizerInterface;
use Palina\App\Domain\Ports\Repository\UserRepositoryInterface;
use Palina\App\Infrastructure\File\CsvRowGenerator;
use Palina\Framework\Contracts\FileProviderInterface;

class ParseDataService
{
    public function __construct(
        private UserDenormalizerInterface $userDenormaliser,
        private UserRepositoryInterface $userRepository,
        private FileProviderInterface $fileProvider,
        private CsvRowGenerator $csvRowGenerator,
    ) {
    }

    public function handle(string $filePath): void
    {
        $file = $this->fileProvider->open($filePath,  'r');
        $usersRows = $this->csvRowGenerator->generateRow($file);

        foreach ($usersRows as $row) {
            $user = $this->userDenormaliser->denormalize($row);
            $this->userRepository->save($user);
        }
    }
}
