<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function create(array $data): Tag
    {
        return Tag::create($data);
    }
}
