<?php

namespace App\Observers;

use App\Models\VoteEvent;
use App\Services\ActivityLoggerService;

class VoteEventObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El evento de votación ';

    /**
     * Handle the VoteEvent "created" event.
     */
    public function created(VoteEvent $voteEvent): void
    {
        $message = self::MESSAGE . $voteEvent->label . ' fue creada';
        $this->activityLog->default('created', $message, $voteEvent);
    }

    /**
     * Handle the VoteEvent "updated" event.
     */
    public function updated(VoteEvent $voteEvent): void
    {
        if ($voteEvent->wasChanged('deleted_at') && is_null($voteEvent->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $voteEvent->label . ' fue actualizada';
        $this->activityLog->default('updated', $message, $voteEvent);
    }

    /**
     * Handle the VoteEvent "deleted" event.
     */
    public function deleted(VoteEvent $voteEvent): void
    {
        if ($voteEvent->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $voteEvent->label . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $voteEvent);
    }

    /**
     * Handle the VoteEvent "restored" event.
     */
    public function restored(VoteEvent $voteEvent): void
    {
        $message = self::MESSAGE . $voteEvent->label . ' fue restaurada';
        $this->activityLog->default('restored', $message, $voteEvent);
    }

    /**
     * Handle the VoteEvent "force deleted" event.
     */
    public function forceDeleted(VoteEvent $voteEvent): void
    {
        $message = self::MESSAGE . $voteEvent->label . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $voteEvent);
    }
}
