<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
{
    public function create(array $data): Contact
    {
        return Contact::create($data);
    }
}
