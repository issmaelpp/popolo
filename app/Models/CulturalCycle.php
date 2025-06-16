<?php

namespace App\Models;

use App\Observers\CulturalCycleObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CulturalCycleObserver::class])]
class CulturalCycle extends Model
{
    /** @use HasFactory<\Database\Factories\CulturalCycleFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'title',
        'description',
    ];

    public function dimensions(): HasMany
    {
        return $this->hasMany(Dimension::class);
    }
}
