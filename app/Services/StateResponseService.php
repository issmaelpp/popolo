<?php

namespace App\Services;

use App\Models\StateResponse;

class StateResponseService
{
    public function create(array $data): StateResponse
    {
        return StateResponse::create($data);
    }
}
