<?php

namespace Palina\Framework\Exceptions\FileSystem;

class FileNotFoundException extends \Exception implements FileSystemExceptionInterface
{
    public function __construct(string $path, ?string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        $message = $message ?: "File not found at $path.";
        parent::__construct($message, $code, $previous);
    }
}