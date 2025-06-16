<?php

namespace App\Services;

use App\Models\CulturalCycle;

class CulturalCycleService
{
    public function create(array $data): CulturalCycle
    {
        return CulturalCycle::create($data);
    }
}
