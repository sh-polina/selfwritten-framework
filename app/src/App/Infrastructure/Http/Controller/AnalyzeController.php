<?php

declare(strict_types=1);

namespace Palina\App\Infrastructure\Http\Controller;

use Palina\App\Application\Service\AnalyzeDataService;

class AnalyzeController
{
    public function __construct(private AnalyzeDataService $analyzeDataService)
    {
    }

    public function analyze(): array
    {
        return iterator_to_array($this->analyzeDataService->handle($_GET));
    }
}
