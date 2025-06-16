<?php

namespace App\Services;

use App\Models\Image;

class ImageService
{
    public function create(array $data): Image
    {
        return Image::create($data);
    }
}
