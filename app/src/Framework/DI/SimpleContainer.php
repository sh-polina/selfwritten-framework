<?php

namespace Palina\Framework\DI;

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
