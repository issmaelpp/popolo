<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $data): User
    {
        return User::create($data);
    }
}
