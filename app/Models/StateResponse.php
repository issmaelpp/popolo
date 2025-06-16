<?php

namespace App\Models;

use App\Observers\StateResponseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([StateResponseObserver::class])]
class StateResponse extends Model
{
    /** @use HasFactory<\Database\Factories\StateResponseFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'civil_request_id',
        'organization_id',
        'person_id',
        'response',
        'responded_at'
    ];

    protected function casts(): array
    {
        return [
            'responded_at'=> 'datetime',
        ];
    }

    public function civilRequest(): BelongsTo
    {
        return $this->belongsTo(CivilRequest::class);
    }

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
