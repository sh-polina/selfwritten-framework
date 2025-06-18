<?php

namespace Palina\App\Infrastructure\Http\Controller;

use Palina\App\Application\Service\ParseDataService;

class ParseController
{
    public function __construct(private ParseDataService $parseDataService)
    {
    }

    public function parse(): void
    {
        $timestamp = time();
        $filename = "uploaded_{$timestamp}.csv";
        $uploadPath = dirname(__DIR__, 5).'/resources/userUploaded/'.$filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath)) {
            $this->parseDataService->handle($uploadPath);
            echo 'file uploaded successfully';
        }
    }
}
