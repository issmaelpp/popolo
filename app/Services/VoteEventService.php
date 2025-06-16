<?php

namespace App\Services;

use App\Models\VoteEvent;

class VoteEventService
{
    public function create(array $data): VoteEvent
    {
        return VoteEvent::create($data);
    }
}
