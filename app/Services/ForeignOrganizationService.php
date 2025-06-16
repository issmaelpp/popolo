<?php

namespace App\Services;

use App\Models\ForeignOrganization;

class ForeignOrganizationService
{
    public function create(array $data): ForeignOrganization
    {
        return ForeignOrganization::create($data);
    }
}
