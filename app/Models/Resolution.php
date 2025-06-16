<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\ResolutionObserver;
use App\Services\WordFormatterService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

#[ObservedBy([ResolutionObserver::class])]
class Resolution extends Model
{
    /** @use HasFactory<\Database\Factories\ResolutionFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';
    protected $fillable = [
        'slug',
        'title',
        'resolution_number',
        'seen',
        'considering',
        'resolution',
        'date',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'status' => GeneralStatusEnum::class
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
        static::creating(function (Resolution $model) {
            $date = Carbon::now()->format('d-m-Y');
            $model->slug = Str::slug("{$date}-{$model->title}");
        });
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationResolution::class)->withTimestamps()->withPivot('organization_id', 'resolution_id');
    }
}
