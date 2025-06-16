<?php

namespace App\Services;

use App\Models\Domain;

class DomainService
{
    public function create(array $data): Domain
    {
        return Domain::create($data);
    }
}
