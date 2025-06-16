<?php

namespace App\Services;

use App\Models\HistoryOf;

class HistoryOfService
{
    public function create(array $data): HistoryOf
    {
        return HistoryOf::create($data);
    }
}
