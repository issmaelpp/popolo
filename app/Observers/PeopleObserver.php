<?php

namespace App\Observers;

use App\Models\People;
use App\Services\ActivityLoggerService;

class PeopleObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La persona ';

    /**
     * Handle the People "created" event.
     */
    public function created(People $people): void
    {
        $message = self::MESSAGE . $people->full_name . ' fue creada';
        $this->activityLog->default('created', $message, $people);
    }

    /**
     * Handle the People "updated" event.
     */
    public function updated(People $people): void
    {
        if ($people->wasChanged('deleted_at') && is_null($people->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $people->full_name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $people);
    }

    /**
     * Handle the People "deleted" event.
     */
    public function deleted(People $people): void
    {
        if ($people->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $people->full_name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $people);
    }

    /**
     * Handle the People "restored" event.
     */
    public function restored(People $people): void
    {
        $message = self::MESSAGE . $people->full_name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $people);
    }

    /**
     * Handle the People "force deleted" event.
     */
    public function forceDeleted(People $people): void
    {
        $message = self::MESSAGE . $people->full_name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $people);
    }
}
