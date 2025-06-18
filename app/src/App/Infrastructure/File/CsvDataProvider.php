<?php

namespace Palina\App\Infrastructure\File;

class CsvDataProvider
{
    public function __construct(private CsvRowGenerator $rows)
    {
    }

    public function toArray(\SplFileObject $file): array
    {
        $users = [];

        foreach ($this->rows->generate($file) as $row) {
            $users[] = $row;
        }

        return $users;
    }
}
