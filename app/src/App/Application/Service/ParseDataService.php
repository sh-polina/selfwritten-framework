<?php

namespace Palina\App\Application\Service;

use Palina\App\Domain\Ports\UserDenormalizerInterface;
use Palina\App\Domain\Repository\UserRepositoryInterface;
use Palina\App\Infrastructure\File\CsvDataProvider;
use Palina\Framework\Contracts\FileProviderInterface;

class ParseDataService
{
    public function __construct(
        private UserDenormalizerInterface $userDenormaliser,
        private UserRepositoryInterface   $userRepository,
        private FileProviderInterface     $fileProvider,
        private CsvDataProvider           $csvDataProvider,
    ) {
    }

    public function handle(string $filePath): void
    {
        $usersArray = [];
        $file = $this->fileProvider->open($filePath);
        $dataArray = $this->csvDataProvider->toArray($file);

        foreach ($dataArray as $user) {
            $usersArray[] = $this->userDenormaliser->denormalize($user);
        }

        foreach ($usersArray as $user) {
            $this->userRepository->save($user);
        }
    }
}
