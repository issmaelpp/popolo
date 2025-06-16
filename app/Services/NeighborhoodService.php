<?php

namespace App\Services;

use App\Models\Neighborhood;

class NeighborhoodService
{
    public function create(array $data): Neighborhood
    {
        return Neighborhood::create($data);
    }
}
