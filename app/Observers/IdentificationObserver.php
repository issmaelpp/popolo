<?php

namespace App\Observers;

use App\Models\Identification;
use App\Services\ActivityLoggerService;

class IdentificationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La identificación ';

    /**
     * Handle the Identification "created" event.
     */
    public function created(Identification $identification): void
    {
        $message = self::MESSAGE . $identification->value . ' fue creada';
        $this->activityLog->default('created', $message, $identification);
    }

    /**
     * Handle the Identification "updated" event.
     */
    public function updated(Identification $identification): void
    {
        if ($identification->wasChanged('deleted_at') && is_null($identification->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $identification->value . ' fue actualizada';
        $this->activityLog->default('updated', $message, $identification);
    }

    /**
     * Handle the Identification "deleted" event.
     */
    public function deleted(Identification $identification): void
    {
        if ($identification->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $identification->value . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $identification);
    }

    /**
     * Handle the Identification "restored" event.
     */
    public function restored(Identification $identification): void
    {
        $message = self::MESSAGE . $identification->value . ' fue restaurada';
        $this->activityLog->default('restored', $message, $identification);
    }

    /**
     * Handle the Identification "force deleted" event.
     */
    public function forceDeleted(Identification $identification): void
    {
        $message = self::MESSAGE . $identification->value . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $identification);
    }
}
