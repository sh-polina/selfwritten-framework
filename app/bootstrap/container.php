<?php

use Dotenv\Dotenv;
use Palina\App\Application\Denormalizer\User\CsvUserDenormalizer;
use Palina\App\Application\Denormalizer\User\UserDenormalizer;
use Palina\App\Application\Hydrator\User\UserHydrator;
use Palina\App\Application\Service\AnalyzeDataService;
use Palina\App\Application\Service\ParseDataService;
use Palina\App\Domain\Filter\FilterBuilder;
use Palina\App\Domain\Ports\UserDenormalizerInterface;
use Palina\App\Domain\Ports\UserHydratorInterface;
use Palina\App\Domain\Ports\FilterBuilderInterface;
use Palina\App\Domain\Repository\UserRepositoryInterface;
use Palina\App\Infrastructure\File\CsvDataProvider;
use Palina\App\Infrastructure\File\CsvRowGenerator;
use Palina\App\Infrastructure\Repository\Database\UserRepository;
use Palina\Framework\Contracts\FileProviderInterface;
use Palina\Framework\DI\SimpleContainer;
use Palina\Framework\FileSystem\FileProvider;

return (function (): SimpleContainer {
    $container = new SimpleContainer();
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();

    $dsn = $_ENV['DSN'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $container->set(PDO::class, $pdo);
    $container->set(UserHydratorInterface::class, new UserHydrator());
    $container->set(UserDenormalizerInterface::class . '.db', new UserDenormalizer());
    $container->set(UserDenormalizerInterface::class . '.csv', new CsvUserDenormalizer());
    $container->set(CsvRowGenerator::class, new CsvRowGenerator());
    $container->set(FilterBuilder::class, new FilterBuilder());
    $container->set(FilterBuilderInterface::class, $container->get(FilterBuilder::class));
    $container->set(FileProvider::class, new FileProvider());
    $container->set(FileProviderInterface::class, $container->get(FileProvider::class));
    $container->set(CsvRowGenerator::class, new CsvRowGenerator());
    $container->set(CsvDataProvider::class, new CsvDataProvider($container->get(CsvRowGenerator::class)));

    $container->set(UserRepositoryInterface::class, new UserRepository(
        $container->get(PDO::class),
        $container->get(UserHydratorInterface::class),
        $container->get(UserDenormalizerInterface::class . '.db'),
    ));

    $container->set(ParseDataService::class, new ParseDataService(
        $container->get(UserDenormalizerInterface::class . '.csv'),
        $container->get(UserRepositoryInterface::class),
        $container->get(FileProviderInterface::class),
        $container->get(CsvDataProvider::class),
    ));

    $container->set(AnalyzeDataService::class, new AnalyzeDataService(
        $container->get(UserRepositoryInterface::class),
        $container->get(UserHydratorInterface::class),
        $container->get(FilterBuilderInterface::class),
    ));

    return $container;
})();
