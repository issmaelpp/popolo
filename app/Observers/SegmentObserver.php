<?php

namespace App\Observers;

use App\Models\Segment;
use App\Services\ActivityLoggerService;

class SegmentObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'Un segmento en ';

    /**
     * Handle the Segment "created" event.
     */
    public function created(Segment $segment): void
    {
        $message = self::MESSAGE . $segment->trafficLine->name . ' fue creado';
        $this->activityLog->default('created', $message, $segment);
    }

    /**
     * Handle the Segment "updated" event.
     */
    public function updated(Segment $segment): void
    {
        if ($segment->wasChanged('deleted_at') && is_null($segment->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $segment->trafficLine->name . ' fue actualizado';
        $this->activityLog->default('updated', $message, $segment);
    }

    /**
     * Handle the Segment "deleted" event.
     */
    public function deleted(Segment $segment): void
    {
        if ($segment->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $segment->trafficLine->name . ' fue eliminado';
        $this->activityLog->default('deleted', $message, $segment);
    }

    /**
     * Handle the Segment "restored" event.
     */
    public function restored(Segment $segment): void
    {
        $message = self::MESSAGE . $segment->trafficLine->name . ' fue restaurado';
        $this->activityLog->default('restored', $message, $segment);
    }

    /**
     * Handle the Segment "force deleted" event.
     */
    public function forceDeleted(Segment $segment): void
    {
        $message = self::MESSAGE . $segment->trafficLine->name . ' fue eliminado permanentemente';
        $this->activityLog->default('force_deleted', $message, $segment);
    }
}
