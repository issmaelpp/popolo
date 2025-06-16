<?php

namespace App\Services;

use App\Models\Motion;

class MotionService
{
    public function create(array $data): Motion
    {
        return Motion::create($data);
    }
}
