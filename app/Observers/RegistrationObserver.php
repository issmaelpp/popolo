<?php

namespace App\Observers;

use App\Models\Registration;
use App\Services\ActivityLoggerService;

class RegistrationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El registro ';

    /**
     * Handle the Registration "created" event.
     */
    public function created(Registration $registration): void
    {
        $message = self::MESSAGE . $registration->name . ' fue creada';
        $this->activityLog->default('created', $message, $registration);
    }

    /**
     * Handle the Registration "updated" event.
     */
    public function updated(Registration $registration): void
    {
        if ($registration->wasChanged('deleted_at') && is_null($registration->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $registration->name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $registration);
    }

    /**
     * Handle the Registration "deleted" event.
     */
    public function deleted(Registration $registration): void
    {
        if ($registration->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $registration->name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $registration);
    }

    /**
     * Handle the Registration "restored" event.
     */
    public function restored(Registration $registration): void
    {
        $message = self::MESSAGE . $registration->name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $registration);
    }

    /**
     * Handle the Registration "force deleted" event.
     */
    public function forceDeleted(Registration $registration): void
    {
        $message = self::MESSAGE . $registration->name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $registration);
    }
}
