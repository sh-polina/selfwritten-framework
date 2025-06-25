<?php

declare(strict_types=1);

namespace Palina\Framework\DI;

use Palina\Framework\Exceptions\DI\DependencyNotFoundException;
use Psr\Container\ContainerInterface;

class SimpleContainer implements ContainerInterface
{
    private array $bindings = [];

    /**
     * @throws DependencyNotFoundException
     */
    public function get(string $id): mixed
    {
        if (!$this->has($id)) {
            throw new DependencyNotFoundException($id);
        }

        return $this->bindings[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->bindings);
    }

    public function set(string $id, $value): void
    {
        $this->bindings[$id] = $value;
    }
}
