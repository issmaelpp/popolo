<?php

namespace App\Models;

use App\Observers\ArticleOrganizationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ArticleOrganizationObserver::class])]
class ArticleOrganization extends Pivot
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'article_id',
        'organization_id',
    ];
}
