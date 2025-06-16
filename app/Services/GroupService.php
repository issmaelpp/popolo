<?php

namespace App\Services;

use App\Models\Group;

class GroupService
{
    public function create(array $data): Group
    {
        return Group::create($data);
    }
}
