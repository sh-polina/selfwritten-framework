<?php

namespace Palina\Framework\Contracts;

interface FileProviderInterface
{
    public function open(string $path): \SplFileObject;
}
