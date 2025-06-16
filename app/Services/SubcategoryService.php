<?php

namespace App\Services;

use App\Models\Subcategory;

class SubcategoryService
{
    public function create(array $data): Subcategory
    {
        return Subcategory::create($data);
    }
}
