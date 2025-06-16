<?php

namespace App\Observers;

use App\Models\InternationalClassification;
use App\Services\ActivityLoggerService;

class InternationalClassificationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La clasificación internacional ';

    /**
     * Handle the InternationalClassification "created" event.
     */
    public function created(InternationalClassification $internationalClassification): void
    {
        $message = self::MESSAGE . $internationalClassification->title . ' fue creada';
        $this->activityLog->default('created', $message, $internationalClassification);
    }

    /**
     * Handle the InternationalClassification "updated" event.
     */
    public function updated(InternationalClassification $internationalClassification): void
    {
        if ($internationalClassification->wasChanged('deleted_at') && is_null($internationalClassification->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $internationalClassification->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $internationalClassification);
    }

    /**
     * Handle the InternationalClassification "deleted" event.
     */
    public function deleted(InternationalClassification $internationalClassification): void
    {
        if ($internationalClassification->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $internationalClassification->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $internationalClassification);
    }

    /**
     * Handle the InternationalClassification "restored" event.
     */
    public function restored(InternationalClassification $internationalClassification): void
    {
        $message = self::MESSAGE . $internationalClassification->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $internationalClassification);
    }

    /**
     * Handle the InternationalClassification "force deleted" event.
     */
    public function forceDeleted(InternationalClassification $internationalClassification): void
    {
        $message = self::MESSAGE . $internationalClassification->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $internationalClassification);
    }
}
