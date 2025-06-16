<?php

namespace App\Models;

use App\Observers\VoteObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([VoteObserver::class])]
class Vote extends Model
{
    /** @use HasFactory<\Database\Factories\VoteFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'vote_event_id',
        'voter_id', // person_id
        'pair_id', // person_id
        'group_id',
        'option',
        'role',
        'weight',
        'paired',
        'note',
        'vote_method',
        'vote_date',
        'sources',
        'links',
        'external_id',
        'source_system',
    ];

    protected function casts(): array
    {
        return [
            'weight' => 'decimal',
            'paired' => 'boolean',
            'vote_date' => 'datetime',
            'sources' => 'array',
            'links' => 'array',
        ];
    }
}
