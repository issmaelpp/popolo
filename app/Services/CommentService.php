<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    public function create(array $data): Comment
    {
        return Comment::create($data);
    }
}
