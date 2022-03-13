<?php

namespace App;

class Container
{

    private array $objects = [];

    public function __construct()
    {
        $this->objects = [
            'db' => fn() => new Db(),
            'repository.user' => fn() => new UserRepository($this->get('db')),
            'controller.user' => fn() => new UserController($this->get('repository.user')),
        ];
    }

    public function has(string $id): bool
    {
        return isset($this->objects[$id]);
    }

    public function get(string $id): mixed
    {
        return $this->objects[$id]();
    }

}
