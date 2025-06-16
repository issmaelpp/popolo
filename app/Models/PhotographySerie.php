<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\PhotographySerieObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([PhotographySerieObserver::class])]
class PhotographySerie extends Model
{
    /** @use HasFactory<\Database\Factories\PhotographySerieFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'status',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'status' => GeneralStatusEnum::class,
        ];
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class, 'photography_serie_id');
    }
}
