<?php

namespace App;

class Container
{

    private array $objects = [];

    public function __construct()
    {
        $this->objects = [
            Db::class => fn() => new Db(),
            UserRepository::class => fn() => new UserRepository($this->get(Db::class)),
            UserController::class => fn() => new UserController($this->get(UserRepository::class)),
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
