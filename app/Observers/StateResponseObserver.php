<?php

namespace App\Observers;

use App\Models\StateResponse;
use App\Services\ActivityLoggerService;

class StateResponseObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La respuesta del estado ';

    /**
     * Handle the StateResponse "created" event.
     */
    public function created(StateResponse $stateResponse): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $stateResponse);
    }

    /**
     * Handle the StateResponse "updated" event.
     */
    public function updated(StateResponse $stateResponse): void
    {
        if ($stateResponse->wasChanged('deleted_at') && is_null($stateResponse->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $stateResponse);
    }

    /**
     * Handle the StateResponse "deleted" event.
     */
    public function deleted(StateResponse $stateResponse): void
    {
        if ($stateResponse->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $stateResponse);
    }

    /**
     * Handle the StateResponse "restored" event.
     */
    public function restored(StateResponse $stateResponse): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $stateResponse);
    }

    /**
     * Handle the StateResponse "force deleted" event.
     */
    public function forceDeleted(StateResponse $stateResponse): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $stateResponse);
    }
}
