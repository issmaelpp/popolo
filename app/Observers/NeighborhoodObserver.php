<?php

namespace App\Observers;

use App\Models\Neighborhood;
use App\Services\ActivityLoggerService;

class NeighborhoodObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El barrio ';
    /**
     * Handle the Neighborhood "created" event.
     */
    public function created(Neighborhood $neighborhood): void
    {
        $message = self::MESSAGE . $neighborhood->name . ' fue creado';
        app(ActivityLoggerService::class)->general('created', $message, $neighborhood);
    }

    /**
     * Handle the Neighborhood "updated" event.
     */
    public function updated(Neighborhood $neighborhood): void
    {
        if ($neighborhood->wasChanged('deleted_at') && is_null($neighborhood->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $neighborhood->name . ' fue actualizado';
        app(ActivityLoggerService::class)->general('updated', $message, $neighborhood);
    }

    /**
     * Handle the Neighborhood "deleted" event.
     */
    public function deleted(Neighborhood $neighborhood): void
    {
        if ($neighborhood->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $neighborhood->name . ' fue eliminado';
        app(ActivityLoggerService::class)->general('deleted', $message, $neighborhood);
    }

    /**
     * Handle the Neighborhood "restored" event.
     */
    public function restored(Neighborhood $neighborhood): void
    {
        $message = self::MESSAGE . $neighborhood->name . ' fue restaurado';
        app(ActivityLoggerService::class)->general('restored', $message, $neighborhood);
    }

    /**
     * Handle the Neighborhood "force deleted" event.
     */
    public function forceDeleted(Neighborhood $neighborhood): void
    {
        $message = self::MESSAGE . $neighborhood->name . ' fue eliminado permanentemente';
        app(ActivityLoggerService::class)->general('force_deleted', $message, $neighborhood);
    }
}
