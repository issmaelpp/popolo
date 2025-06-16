<?php

namespace App\Models;

use App\Observers\RegistrantObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([RegistrantObserver::class])]
class Registrant extends Model
{
    /** @use HasFactory<\Database\Factories\RegistrantFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'registration_id',
        'people_id',
        'restriction',
    ];

    protected function casts(): array
    {
        return [
            'restriction' => 'boolean',
        ];
    }

    public function registration(): BelongsTo
    {
        return $this->belongsTo(Registration::class);
    }

    public function people(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
