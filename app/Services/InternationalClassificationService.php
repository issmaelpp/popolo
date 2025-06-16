<?php

namespace App\Services;

use App\Models\InternationalClassification;

class InternationalClassificationService
{
    public function create(array $data): InternationalClassification
    {
        return InternationalClassification::create($data);
    }
}
