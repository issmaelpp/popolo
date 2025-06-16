<?php

namespace App\Models;

use App\Enums\ArticleTypeEnum;
use App\Enums\GeneralStatusEnum;
use App\Observers\ArticleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ArticleObserver::class])]
class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'person_id',
        'type',
        'slug',
        'title',
        'lead',
        'image',
        'body',
        'status',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'type' => ArticleTypeEnum::class,
            'status' => GeneralStatusEnum::class,
            'published_at' => 'datetime',
        ];
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)->using(ArticleOrganization::class)->withTimestamps()->withPivot('article_id', 'organization_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->using(ArticleTag::class)->withTimestamps()->withPivot('article_id', 'tag_id');
    }
}
