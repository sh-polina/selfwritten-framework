<?php

namespace Palina\Framework\DI;

class DependencyNotFoundException extends \Exception
{
    public function __construct(string $id, ?string $message = '', $code = 0, ?\Throwable $previous = null)
    {
        $message = $message ?: "Dependency with ID '$id' not found in the container.";
        parent::__construct($message, $code, $previous);
    }
}
