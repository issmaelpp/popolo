<?php

namespace App\Services;

use App\Models\Resolution;

class ResolutionService
{
    public function create(array $data): Resolution
    {
        return Resolution::create($data);
    }
}
