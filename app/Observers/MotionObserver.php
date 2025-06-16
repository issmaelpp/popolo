<?php

namespace App\Observers;

use App\Models\Motion;
use App\Services\ActivityLoggerService;

class MotionObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La moción ';

    /**
     * Handle the Motion "created" event.
     */
    public function created(Motion $motion): void
    {
        $message = self::MESSAGE . $motion->title . ' fue creada';
        $this->activityLog->default('created', $message, $motion);
    }

    /**
     * Handle the Motion "updated" event.
     */
    public function updated(Motion $motion): void
    {
        if ($motion->wasChanged('deleted_at') && is_null($motion->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $motion->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $motion);
    }

    /**
     * Handle the Motion "deleted" event.
     */
    public function deleted(Motion $motion): void
    {
        if ($motion->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $motion->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $motion);
    }

    /**
     * Handle the Motion "restored" event.
     */
    public function restored(Motion $motion): void
    {
        $message = self::MESSAGE . $motion->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $motion);
    }

    /**
     * Handle the Motion "force deleted" event.
     */
    public function forceDeleted(Motion $motion): void
    {
        $message = self::MESSAGE . $motion->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $motion);
    }
}
