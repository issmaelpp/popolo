<?php

namespace App\Services;

use App\Models\Subdomain;

class SubdomainService
{
    public function create(array $data): Subdomain
    {
        return Subdomain::create($data);
    }
}
