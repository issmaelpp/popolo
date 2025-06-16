<?php

namespace App\Observers;

use App\Models\Registrant;
use App\Services\ActivityLoggerService;

class RegistrantObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El registrante ';

    /**
     * Handle the Registrant "created" event.
     */
    public function created(Registrant $registrant): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $registrant);
    }

    /**
     * Handle the Registrant "updated" event.
     */
    public function updated(Registrant $registrant): void
    {
        if ($registrant->wasChanged('deleted_at') && is_null($registrant->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $registrant);
    }

    /**
     * Handle the Registrant "deleted" event.
     */
    public function deleted(Registrant $registrant): void
    {
        if ($registrant->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $registrant);
    }

    /**
     * Handle the Registrant "restored" event.
     */
    public function restored(Registrant $registrant): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $registrant);
    }

    /**
     * Handle the Registrant "force deleted" event.
     */
    public function forceDeleted(Registrant $registrant): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $registrant);
    }
}
