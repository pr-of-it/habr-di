<?php

namespace App;

class UserController
{

    public function handle()
    {
        $repo = new UserRepository();
        $user = $repo->findByEmail('test@test.com');
        if (empty($user)) {
            throw new \Exception('Пользователь не найден!');
        }
        return <<<RESPONSE
Имя пользователя: $user->name
RESPONSE;
    }

}
