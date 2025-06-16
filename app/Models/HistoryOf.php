<?php

namespace App\Models;

use App\Observers\HistoryOfObserver;
use App\Services\WordFormatterService;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([HistoryOfObserver::class])]
class HistoryOf extends Model
{
    /** @use HasFactory<\Database\Factories\HistoryOfFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'traffic_line_id',
        'neighborhood_id',
        'title',
        'slug',
        'content',
        'is_public',
    ];

    protected function casts(): array
    {
        return [
            'is_public' => 'boolean',
        ];
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => app(WordFormatterService::class)->format($value)
        );
    }

    protected static function booted(): void
    {
        static::creating(function (HistoryOf $model) {
            $model->slug = Str::slug($model->title);
        });
    }

    public function trafficLine(): BelongsTo
    {
        return $this->belongsTo(TrafficLine::class);
    }

    public function neighborhood(): BelongsTo
    {
        return $this->belongsTo(Neighborhood::class);
    }
}
