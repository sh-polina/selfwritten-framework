<?php

namespace Palina\App\Infrastructure\Http\Controller;

use Palina\App\Application\Service\AnalyzeDataService;

class AnalyzeController
{
    public function __construct(private AnalyzeDataService $analyzeDataService)
    {
    }

    public function analyze(): array
    {
        return $this->analyzeDataService->handle($_GET);
    }
}
