<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\CouncilPostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CouncilPostObserver::class])]
class CouncilPost extends Model
{
    /** @use HasFactory<\Database\Factories\CouncilPostFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        //'tag_id', // debe ser muchos a muchos
        'person_id',
        //'organization_id', // debe ser muchos a muchos
        'title',
        'content',
        'type',
        'status',
        'url',
        'source_url',
        'metadata',
        'external_id',
        'source',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'status' => GeneralStatusEnum::class,
            'metadata' => 'array',
            'published_at' => 'datetime',
        ];
    }

    /* public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    } */

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    /* public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    } */
}
