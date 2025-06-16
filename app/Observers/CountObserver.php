<?php

namespace App\Observers;

use App\Models\Count;
use App\Services\ActivityLoggerService;

class CountObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La cuenta ';

    /**
     * Handle the Count "created" event.
     */
    public function created(Count $count): void
    {
        $message = self::MESSAGE . $count->label . ' fue creada';
        $this->activityLog->default('created', $message, $count);
    }

    /**
     * Handle the Count "updated" event.
     */
    public function updated(Count $count): void
    {
        if ($count->wasChanged('deleted_at') && is_null($count->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $count->label . ' fue actualizada';
        $this->activityLog->default('updated', $message, $count);
    }

    /**
     * Handle the Count "deleted" event.
     */
    public function deleted(Count $count): void
    {
        if ($count->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $count->label . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $count);
    }

    /**
     * Handle the Count "restored" event.
     */
    public function restored(Count $count): void
    {
        $message = self::MESSAGE . $count->label . ' fue restaurada';
        $this->activityLog->default('restored', $message, $count);
    }

    /**
     * Handle the Count "force deleted" event.
     */
    public function forceDeleted(Count $count): void
    {
        $message = self::MESSAGE . $count->label . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $count);
    }
}
