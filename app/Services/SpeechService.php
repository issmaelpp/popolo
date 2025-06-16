<?php

namespace App\Services;

use App\Models\Speech;

class SpeechService
{
    public function create(array $data): Speech
    {
        return Speech::create($data);
    }
}
