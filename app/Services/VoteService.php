<?php

namespace App\Services;

use App\Models\Vote;

class VoteService
{
    public function create(array $data): Vote
    {
        return Vote::create($data);
    }
}
