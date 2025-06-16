<?php

namespace App\Services;

use App\Models\Address;

class AddressService
{
    public function create(array $data): Address
    {
        return Address::create($data);
    }
}
