<?php

namespace App\Services;

use App\Models\PhotographySerie;

class PhotographySerieService
{
    public function create(array $data): PhotographySerie
    {
        return PhotographySerie::create($data);
    }
}
