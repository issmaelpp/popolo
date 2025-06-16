<?php

namespace App\Observers;

use App\Models\CulturalCycle;
use App\Services\ActivityLoggerService;

class CulturalCycleObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El ciclo cultural ';

    /**
     * Handle the CulturalCycle "created" event.
     */
    public function created(CulturalCycle $culturalCycle): void
    {
        $message = self::MESSAGE . $culturalCycle->title . ' fue creada';
        $this->activityLog->default('created', $message, $culturalCycle);
    }

    /**
     * Handle the CulturalCycle "updated" event.
     */
    public function updated(CulturalCycle $culturalCycle): void
    {
        if ($culturalCycle->wasChanged('deleted_at') && is_null($culturalCycle->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $culturalCycle->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $culturalCycle);
    }

    /**
     * Handle the CulturalCycle "deleted" event.
     */
    public function deleted(CulturalCycle $culturalCycle): void
    {
        if ($culturalCycle->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $culturalCycle->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $culturalCycle);
    }

    /**
     * Handle the CulturalCycle "restored" event.
     */
    public function restored(CulturalCycle $culturalCycle): void
    {
        $message = self::MESSAGE . $culturalCycle->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $culturalCycle);
    }

    /**
     * Handle the CulturalCycle "force deleted" event.
     */
    public function forceDeleted(CulturalCycle $culturalCycle): void
    {
        $message = self::MESSAGE . $culturalCycle->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $culturalCycle);
    }
}
