<?php

namespace App\Services;

use App\Models\CivilRequest;

class CivilRequestService
{
    public function create(array $data): CivilRequest
    {
        return CivilRequest::create($data);
    }
}
