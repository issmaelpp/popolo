<?php

namespace App\Services;

use App\Models\People;

class PeopleService
{
    public function create(array $data): People
    {
        return People::create($data);
    }
}
