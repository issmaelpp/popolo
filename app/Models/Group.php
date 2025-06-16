<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\GroupObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([GroupObserver::class])]
class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'label',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => GeneralStatusEnum::class,
        ];
    }

    public function counts(): HasMany
    {
        return $this->hasMany(Count::class);
    }

    public function motions(): HasMany
    {
        return $this->hasMany(Motion::class);
    }
}
