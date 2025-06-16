<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function create(array $data): Category
    {
        return Category::create($data);
    }
}
