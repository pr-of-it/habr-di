<?php

namespace App;

class UserController
{

    private UserRepository $userRepository;

    public function setUserRepository(UserRepository $userRepository): self
    {
        $this->userRepository = $userRepository;
        return $this;
    }

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
