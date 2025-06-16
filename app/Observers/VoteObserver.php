<?php

namespace App\Observers;

use App\Models\Vote;
use App\Services\ActivityLoggerService;

class VoteObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El voto ';

    /**
     * Handle the Vote "created" event.
     */
    public function created(Vote $vote): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $vote);
    }

    /**
     * Handle the Vote "updated" event.
     */
    public function updated(Vote $vote): void
    {
        if ($vote->wasChanged('deleted_at') && is_null($vote->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $vote);
    }

    /**
     * Handle the Vote "deleted" event.
     */
    public function deleted(Vote $vote): void
    {
        if ($vote->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $vote);
    }

    /**
     * Handle the Vote "restored" event.
     */
    public function restored(Vote $vote): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $vote);
    }

    /**
     * Handle the Vote "force deleted" event.
     */
    public function forceDeleted(Vote $vote): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $vote);
    }
}
