<?php

namespace App\Models;

use App\Observers\ArticleTagObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ArticleTagObserver::class])]
class ArticleTag extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'article_id',
        'tag_id',
    ];
}
