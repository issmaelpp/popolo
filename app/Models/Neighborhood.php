<?php

namespace App\Models;

use App\Observers\NeighborhoodObserver;
use App\Services\WordFormatterService;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([NeighborhoodObserver::class])]
class Neighborhood extends Model
{
    /** @use HasFactory<\Database\Factories\NeighborhoodFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'name',
        'full_name',
        'slug',
        'coordinate',
    ];

    protected function casts(): array
    {
        return [
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
        static::creating(function (Neighborhood $model) {
            $model->slug = Str::slug($model->name);
        });
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
