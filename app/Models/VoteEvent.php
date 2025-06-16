<?php

namespace App\Models;

use App\Observers\VoteEventObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([VoteEventObserver::class])]
class VoteEvent extends Model
{
    /** @use HasFactory<\Database\Factories\VoteEventFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'organization_id',
        'identifier',
        'label',
        'description',
        'start_date',
        'end_date',
        'start_datetime',
        'end_datetime',
        'result',
        'group_results',
        'vote_method',
        'yes_count',
        'no_count',
        'abstain_count',
        'absent_count',
        'not_voting_count',
        'requirement',
        'required_votes',
        'legislative_session_id',
        'chamber',
        'vote_number',
        'status',
        'sources',
        'links',
        'note',
        'external_id',
        'source_system',
    ];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date'=> 'date',
            'start_datetime' => 'datetime',
            'end_datetime'=> 'datetime',
            'group_results'=> 'array',
            'yes_count'=> 'integer',
            'no_count'=> 'integer',
            'abstain_count'=> 'integer',
            'absent_count'=> 'integer',
            'not_voting_count'=> 'integer',
            'required_votes'=> 'integer',
            'vote_number'=> 'integer',
            'sources'=> 'array',
            'links'=> 'array',
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

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }
}
