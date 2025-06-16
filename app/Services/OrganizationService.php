<?php

namespace App\Services;

use App\Models\Organization;

class OrganizationService
{
    public function create(array $data): Organization
    {
        return Organization::create($data);
    }
}
