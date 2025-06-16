<?php

namespace App\Models;

use App\Observers\CountObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([CountObserver::class])]
class Count extends Model
{
    /** @use HasFactory<\Database\Factories\CountFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'group_id',
        'vote_event_id',
        'option',
        'label',
        'note',
        'sources',
        'links',
        'external_id',
        'source_system',
    ];

    protected function casts(): array
    {
        return [
            'source'=> 'array',
            'links' => 'array',
        ];
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function voteEvent(): BelongsTo
    {
        return $this->belongsTo(VoteEvent::class);
    }
}
