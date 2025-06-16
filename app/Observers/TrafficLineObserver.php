<?php

namespace App\Observers;

use App\Models\TrafficLine;
use App\Services\ActivityLoggerService;

class TrafficLineObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La línea de tráfico ';

    /**
     * Handle the TrafficLine "created" event.
     */
    public function created(TrafficLine $trafficLine): void
    {
        $message = self::MESSAGE . $trafficLine->full_name . ' fue creada';
        $this->activityLog->default('created', $message, $trafficLine);
    }

    /**
     * Handle the TrafficLine "updated" event.
     */
    public function updated(TrafficLine $trafficLine): void
    {
        if ($trafficLine->wasChanged('deleted_at') && is_null($trafficLine->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $trafficLine->full_name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $trafficLine);
    }

    /**
     * Handle the TrafficLine "deleted" event.
     */
    public function deleted(TrafficLine $trafficLine): void
    {
        if ($trafficLine->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $trafficLine->full_name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $trafficLine);
    }

    /**
     * Handle the TrafficLine "restored" event.
     */
    public function restored(TrafficLine $trafficLine): void
    {
        $message = self::MESSAGE . $trafficLine->full_name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $trafficLine);
    }

    /**
     * Handle the TrafficLine "force deleted" event.
     */
    public function forceDeleted(TrafficLine $trafficLine): void
    {
        $message = self::MESSAGE . $trafficLine->full_name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $trafficLine);
    }
}
