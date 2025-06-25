<?php

namespace Palina\Framework\Exceptions\FileSystem;

class FileNotReadableException extends \Exception implements FileSystemExceptionInterface
{
    public function __construct(string $path, ?string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        $message = $message ?: "File is not readable at $path.";
        parent::__construct($message, $code, $previous);
    }
}