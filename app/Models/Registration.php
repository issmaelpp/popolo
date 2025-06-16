<?php

namespace App\Models;

use App\Enums\GeneralStatusEnum;
use App\Observers\RegistrationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([RegistrationObserver::class])]
class Registration extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrationFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'slug',
        'name',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
           'status' => GeneralStatusEnum::class,
        ];
    }

    public function registrants(): HasMany
    {
        return $this->hasMany(Registrant::class);
    }
}
