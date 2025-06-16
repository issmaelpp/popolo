<?php

namespace App\Services;

use App\Models\Section;

class SectionService
{
    public function create(array $data): Section
    {
        return Section::create($data);
    }
}
