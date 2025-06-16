<?php

namespace App\Models;

use App\Enums\TrafficLineTypeEnum;
use App\Observers\TrafficLineObserver;
use App\Services\WordFormatterService;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([TrafficLineObserver::class])]
class TrafficLine extends Model
{
    /** @use HasFactory<\Database\Factories\TrafficLineFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'traffic_line_type',
        'name',
        'full_name',
        'slug',
        'coordinate',
    ];

    protected function casts(): array
    {
        return [
            'traffic_line_type' => TrafficLineTypeEnum::class,
            'coordinate' => 'array',
        ];
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => app(WordFormatterService::class)->format($value)
        );
    }

    protected static function booted(): void
    {
        static::creating(function (TrafficLine $model) {
            $model->full_name = "{$model->traffic_line_type->getLabel()} {$model->name}";
            $model->slug = Str::slug("{$model->traffic_line_type->getLabel()}-{$model->name}");
        });
    }

    public function segments(): HasMany
    {
        return $this->hasMany(Segment::class);
    }

    public function historyOfs(): HasMany
    {
        return $this->hasMany(HistoryOf::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
