<?php

namespace App\Models;

use App\Enums\IdentificationTypeEnum;
use App\Observers\IdentificationObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([IdentificationObserver::class])]
class Identification extends Model
{
    /** @use HasFactory<\Database\Factories\IdentificationFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'foreign_organization_id',
        'person_id',
        'type',
        'value',
    ];

    protected function casts(): array
    {
        return [
            'type' => IdentificationTypeEnum::class,
        ];
    }

    public function foreignOrganization(): BelongsTo
    {
        return $this->belongsTo(ForeignOrganization::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
