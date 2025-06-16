<?php

namespace App\Observers;

use App\Models\Dimension;
use App\Services\ActivityLoggerService;

class DimensionObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La dimensión ';

    /**
     * Handle the Dimension "created" event.
     */
    public function created(Dimension $dimension): void
    {
        $message = self::MESSAGE . $dimension->label . ' fue creada';
        $this->activityLog->default('created', $message, $dimension);
    }

    /**
     * Handle the Dimension "updated" event.
     */
    public function updated(Dimension $dimension): void
    {
        if ($dimension->wasChanged('deleted_at') && is_null($dimension->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $dimension->label . ' fue actualizada';
        $this->activityLog->default('updated', $message, $dimension);
    }

    /**
     * Handle the Dimension "deleted" event.
     */
    public function deleted(Dimension $dimension): void
    {
        if ($dimension->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $dimension->label . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $dimension);
    }

    /**
     * Handle the Dimension "restored" event.
     */
    public function restored(Dimension $dimension): void
    {
        $message = self::MESSAGE . $dimension->label . ' fue restaurada';
        $this->activityLog->default('restored', $message, $dimension);
    }

    /**
     * Handle the Dimension "force deleted" event.
     */
    public function forceDeleted(Dimension $dimension): void
    {
        $message = self::MESSAGE . $dimension->label . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $dimension);
    }
}
