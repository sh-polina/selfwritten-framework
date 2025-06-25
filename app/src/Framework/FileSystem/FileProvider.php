<?php

declare(strict_types=1);

namespace Palina\Framework\FileSystem;

use Palina\Framework\Contracts\FileProviderInterface;
use Palina\Framework\Exceptions\FileSystem\FileNotFoundException;
use Palina\Framework\Exceptions\FileSystem\FileNotReadableException;

class FileProvider implements FileProviderInterface
{
    /**
     * @throws FileNotReadableException
     * @throws FileNotFoundException
     */
    public function open(string $path, string $mode): \SplFileObject
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException($path);
        }
        $file = new \SplFileObject($path, $mode);

        if (!$file->isReadable()) {
            throw new FileNotReadableException($path);
        }

        return $file;
    }
}
