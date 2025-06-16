<?php

namespace App\Observers;

use App\Models\HistoryOf;
use App\Services\ActivityLoggerService;

class HistoryOfObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La historia de ';

    /**
     * Handle the HistoryOf "created" event.
     */
    public function created(HistoryOf $historyOf): void
    {
        $message = self::MESSAGE . $historyOf->title . ' fue creada';
        $this->activityLog->default('created', $message, $historyOf);
    }

    /**
     * Handle the HistoryOf "updated" event.
     */
    public function updated(HistoryOf $historyOf): void
    {
        if ($historyOf->wasChanged('deleted_at') && is_null($historyOf->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $historyOf->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $historyOf);
    }

    /**
     * Handle the HistoryOf "deleted" event.
     */
    public function deleted(HistoryOf $historyOf): void
    {
        if ($historyOf->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $historyOf->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $historyOf);
    }

    /**
     * Handle the HistoryOf "restored" event.
     */
    public function restored(HistoryOf $historyOf): void
    {
        $message = self::MESSAGE . $historyOf->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $historyOf);
    }

    /**
     * Handle the HistoryOf "force deleted" event.
     */
    public function forceDeleted(HistoryOf $historyOf): void
    {
        $message = self::MESSAGE . $historyOf->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $historyOf);
    }
}
