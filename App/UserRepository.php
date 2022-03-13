<?php

namespace App;

class UserRepository
{

    public function findByEmail(string $email): ?User
    {
        $db = new Db();
        $res = $db->query(
            'SELECT * FROM users WHERE email=:email',
            [':email' => $email],
            User::class
        );
        return !empty($res) ? $res[0] : null;
    }

}
