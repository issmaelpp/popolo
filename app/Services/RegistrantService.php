<?php

namespace App\Services;

use App\Models\Registrant;

class RegistrantService
{
    public function create(array $data): Registrant
    {
        return Registrant::create($data);
    }
}
