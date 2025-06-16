<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\CivilRequestObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CivilRequestObserver::class])]
class CivilRequest extends Model
{
    /** @use HasFactory<\Database\Factories\CivilRequestFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'person_id',
        'subject',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status'=> GeneralStatusEnum::class,
        ];
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }

    public function stateResponses(): HasMany
    {
        return $this->hasMany(StateResponse::class);
    }
}
