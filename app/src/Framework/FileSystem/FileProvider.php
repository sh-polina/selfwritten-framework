<?php

namespace Palina\Framework\FileSystem;

use Palina\Framework\Contracts\FileProviderInterface;

class FileProvider implements FileProviderInterface
{
    public function open(string $path): \SplFileObject
    {
        if (!file_exists($path)) {
            throw new \RuntimeException('File not found: '.$path);
        }
        $file = new \SplFileObject($path, 'r');

        if (!$file->isReadable()) {
            throw new \RuntimeException('File is not readable: '.$path);
        }

        return $file;
    }
}
