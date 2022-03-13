<?php

namespace App;

class UserController
{

    public function __construct(
        private UserRepository $userRepository
    )
    {}

    public function handle()
    {
        $user = $this->userRepository->findByEmail('test@test.com');
        if (empty($user)) {
            throw new \Exception('Пользователь не найден!');
        }
        return <<<RESPONSE
Имя пользователя: $user->name
RESPONSE;
    }

}
