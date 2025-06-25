<?php

declare(strict_types=1);

namespace Palina\App\Infrastructure\File;

class CsvRowGenerator
{
    public function __construct()
    {
    }

    public function generateRow(\SplFileObject $file): \Generator
    {
        $header = $file->fgetcsv();
        while ($row = $file->fgetcsv()) {
            if (count($row) !== count($header)) {
                continue;
            }
            yield array_combine($header, $row);
        }
    }
}
