<?php

namespace App\Services;

use App\Models\Identification;

class IdentificationService
{
    public function create(array $data): Identification
    {
        return Identification::create($data);
    }
}
