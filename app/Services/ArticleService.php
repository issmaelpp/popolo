<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function create(array $data): Article
    {
        return Article::create($data);
    }
}
