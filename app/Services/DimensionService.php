<?php

namespace App\Services;

use App\Models\Dimension;

class DimensionService
{
    public function create(array $data): Dimension
    {
        return Dimension::create($data);
    }
}
