<?php

namespace App\Services;

use App\Models\Count;

class CountService
{
    public function create(array $data): Count
    {
        return Count::create($data);
    }
}
