<?php

namespace App\Models;

use App\Observers\MotionObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([MotionObserver::class])]
class Motion extends Model
{
    /** @use HasFactory<\Database\Factories\MotionFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        //'organization_id', // debe ser muchos a muchos
        'group_id',
        'vote_event_id',
        //'person_id', // debe ser muchos a muchos
        'text',
        'identifier',
        'title',
        'classification',
        'legislative_session_id',
        'datetime',
        'requirement',
        'result',
        //'creator_id', // person_id
        //'co_sponsors', // person_id
        'purpose',
        'summary',
        'sources',
        'links',
        'attachments',
        'external_id',
        'source_system',
    ];

    protected function casts(): array
    {
        return [
            'datetime' => 'datetime',
            'co_sponsors' => 'array',
            'sources' => 'array',
            'links' => 'array',
            'attachments' => 'array',
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
