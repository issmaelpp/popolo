<?php

namespace App\Models;

use App\Enums\OrientationEnum;
use App\Enums\SurfaceTypeEnum;
use App\Observers\SegmentObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([SegmentObserver::class])]
class Segment extends Model
{
    /** @use HasFactory<\Database\Factories\SegmentFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'traffic_line_id',
        'surface_type',
        'orientation',
        'coordinate',
    ];

    protected function casts(): array
    {
        return [
            'surface_type' => SurfaceTypeEnum::class,
            'orientation' => OrientationEnum::class,
            'coordinate' => 'array',
        ];
    }

    public function trafficLine(): BelongsTo
    {
        return $this->belongsTo(TrafficLine::class);
    }
}
