<?php

namespace App\Models;

use App\Observers\SpeechObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[ObservedBy([SpeechObserver::class])]
class Speech extends Model
{
    /** @use HasFactory<\Database\Factories\SpeechFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'person_id',
        'role',
        'attribution_text',
        'text',
        'audio',
        'video',
        'date',
        'start_date',
        'end_date',
        'title',
        'type',
        'position',
        'event_id',
        'section',
        'sources',
        'links',
        'external_id',
        'sources_system',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'sources' => 'array',
            'links' => 'array',
        ];
    }

    public function person(): BelongsTo
    {
        return $this->belongsTo(People::class);
    }
}
