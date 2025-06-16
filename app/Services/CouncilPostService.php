<?php

namespace App\Services;

use App\Models\CouncilPost;

class CouncilPostService
{
    public function create(array $data): CouncilPost
    {
        return CouncilPost::create($data);
    }
}
