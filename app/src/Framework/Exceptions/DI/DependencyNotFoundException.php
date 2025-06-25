<?php

declare(strict_types=1);

namespace Palina\Framework\Exceptions\DI;

class DependencyNotFoundException extends \Exception implements DependencyExceptionInterface
{
    public function __construct(string $id, ?string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        $message = $message ?: "Dependency with ID $id not found in the container.";
        parent::__construct($message, $code, $previous);
    }
}
