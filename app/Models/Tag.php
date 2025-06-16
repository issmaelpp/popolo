<?php

namespace App\Models;

use App\Observers\TagObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([TagObserver::class])]
class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'name',
    ];

    // tiene que ser relacion muchos a muchos
    /* public function councilPosts(): HasMany
    {
        return $this->hasMany(CouncilPost::class);
    } */

    public function articles(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->using(ArticleTag::class)->withTimestamps()->withPivot('article_id', 'tag_id');
    }
}
