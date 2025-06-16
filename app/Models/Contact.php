<?php

namespace App\Models;

use App\Enums\ContactTypeEnum;
use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([ContactObserver::class])]
class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'organization_id',
        'foreign_organization_id',
        'person_id',
        'type',
        'value',
    ];

    protected function casts(): array
    {
        return [
            'type' => ContactTypeEnum::class,
        ];
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
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
