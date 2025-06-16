<?php

namespace App\Services;

use App\Models\Segment;

class SegmentService
{
    public function create(array $data): Segment
    {
        return Segment::create($data);
    }
}
