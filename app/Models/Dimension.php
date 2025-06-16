<?php

namespace App\Models;

use App\Enums\DimensionMeasureEnum;
use App\Enums\DimensionTypeEnum;
use App\Observers\DimensionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([DimensionObserver::class])]
class Dimension extends Model
{
    /** @use HasFactory<\Database\Factories\DimensionFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'international_classification_id',
        'cultural_cycle_id',
        'domain_id',
        'subdomain_id',
        'code',
        'note',
        'label',
        'measure',
        'type',
    ];

    protected function casts(): array
    {
        return [
            'measure' => DimensionMeasureEnum::class,
            'type' => DimensionTypeEnum::class,
        ];
    }

    public function internationalClassification(): BelongsTo
    {
        return $this->belongsTo(InternationalClassification::class);
    }

    public function culturalCycle(): BelongsTo
    {
        return $this->belongsTo(CulturalCycle::class);
    }

    public function domain(): BelongsTo
    {
        return $this->belongsTo(Domain::class);
    }

    public function subdomain(): BelongsTo
    {
        return $this->belongsTo(Subdomain::class);
    }

    /* public function culturalStatisticsFrameworks(): HasMany
    {
        return $this->hasMany(CulturalStatisticsFramework::class);
    } */
}
