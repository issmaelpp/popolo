<?php

namespace App\Services;

use App\Models\TrafficLine;

class TrafficLineService
{
    public function create(array $data): TrafficLine
    {
        return TrafficLine::create($data);
    }
}
