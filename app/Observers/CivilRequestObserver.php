<?php

namespace App\Observers;

use App\Models\CivilRequest;
use App\Services\ActivityLoggerService;

class CivilRequestObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La solicitud civil ';

    /**
     * Handle the CivilRequest "created" event.
     */
    public function created(CivilRequest $civilRequest): void
    {
        $message = self::MESSAGE . $civilRequest->subject . ' fue creada';
        $this->activityLog->default('created', $message, $civilRequest);
    }

    /**
     * Handle the CivilRequest "updated" event.
     */
    public function updated(CivilRequest $civilRequest): void
    {
        if ($civilRequest->wasChanged('deleted_at') && is_null($civilRequest->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $civilRequest->subject . ' fue actualizada';
        $this->activityLog->default('updated', $message, $civilRequest);
    }

    /**
     * Handle the CivilRequest "deleted" event.
     */
    public function deleted(CivilRequest $civilRequest): void
    {
        if ($civilRequest->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $civilRequest->subject . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $civilRequest);
    }

    /**
     * Handle the CivilRequest "restored" event.
     */
    public function restored(CivilRequest $civilRequest): void
    {
        $message = self::MESSAGE . $civilRequest->subject . ' fue restaurada';
        $this->activityLog->default('restored', $message, $civilRequest);
    }

    /**
     * Handle the CivilRequest "force deleted" event.
     */
    public function forceDeleted(CivilRequest $civilRequest): void
    {
        $message = self::MESSAGE . $civilRequest->subject . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $civilRequest);
    }
}
