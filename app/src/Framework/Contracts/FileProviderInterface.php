<?php

declare(strict_types=1);

namespace Palina\Framework\Contracts;

use Palina\Framework\Exceptions\FileSystem\FileNotFoundException;
use Palina\Framework\Exceptions\FileSystem\FileNotReadableException;

interface FileProviderInterface
{
    /**
     * @throws FileNotReadableException
     * @throws FileNotFoundException
     */
    public function open(string $path, string $mode): \SplFileObject;
}
