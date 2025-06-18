<?php

use Palina\App\Application\Service\AnalyzeDataService;
use Palina\App\Application\Service\ParseDataService;
use Palina\App\Infrastructure\File\FakerCSV;
use Palina\App\Infrastructure\Http\Controller\AnalyzeController;
use Palina\App\Infrastructure\Http\Controller\ParseController;

require_once dirname(__DIR__).'/vendor/autoload.php';
$container = require_once dirname(__DIR__).'/bootstrap/container.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$users = [];

if ('/parse' === $uri) {
    include dirname(__DIR__).'/src/App/Infrastructure/Http/Views/parse_form.php';

    if ('POST' === $_SERVER['REQUEST_METHOD']) {
        $parser = new ParseController($container->get(ParseDataService::class));
        $parser->parse();
    }
}

if ('/analyze' === $uri) {
    $analyzer = new AnalyzeController($container->get(AnalyzeDataService::class));
    $users = $analyzer->analyze();
    include dirname(__DIR__).'/src/App/Infrastructure/Http/Views/analyze_form.php';
    include dirname(__DIR__).'/src/App/Infrastructure/Http/Views/users_table.php';
}

if ('/generate' === $uri) {
    include dirname(__DIR__).'/src/App/Infrastructure/Http/Views/generate_form.php';
    $generator = new FakerCSV();

    if (!empty($_POST['rowCount'])) {
        $generator->fakeCSV((int) $_POST['rowCount']);
    }
}
