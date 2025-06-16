<?php

namespace App\Observers;

use App\Models\Resolution;
use App\Services\ActivityLoggerService;

class ResolutionObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La resolución ';

    /**
     * Handle the Resolution "created" event.
     */
    public function created(Resolution $resolution): void
    {
        $message = self::MESSAGE . $resolution->title . ' fue creada';
        $this->activityLog->default('created', $message, $resolution);
    }

    /**
     * Handle the Resolution "updated" event.
     */
    public function updated(Resolution $resolution): void
    {
        if ($resolution->wasChanged('deleted_at') && is_null($resolution->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $resolution->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $resolution);
    }

    /**
     * Handle the Resolution "deleted" event.
     */
    public function deleted(Resolution $resolution): void
    {
        if ($resolution->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $resolution->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $resolution);
    }

    /**
     * Handle the Resolution "restored" event.
     */
    public function restored(Resolution $resolution): void
    {
        $message = self::MESSAGE . $resolution->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $resolution);
    }

    /**
     * Handle the Resolution "force deleted" event.
     */
    public function forceDeleted(Resolution $resolution): void
    {
        $message = self::MESSAGE . $resolution->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $resolution);
    }
}
