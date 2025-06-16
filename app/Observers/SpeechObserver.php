<?php

namespace App\Observers;

use App\Models\Speech;
use App\Services\ActivityLoggerService;

class SpeechObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El discurso ';

    /**
     * Handle the Speech "created" event.
     */
    public function created(Speech $speech): void
    {
        $message = self::MESSAGE . $speech->title . ' fue creada';
        $this->activityLog->default('created', $message, $speech);
    }

    /**
     * Handle the Speech "updated" event.
     */
    public function updated(Speech $speech): void
    {
        if ($speech->wasChanged('deleted_at') && is_null($speech->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $speech->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $speech);
    }

    /**
     * Handle the Speech "deleted" event.
     */
    public function deleted(Speech $speech): void
    {
        if ($speech->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $speech->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $speech);
    }

    /**
     * Handle the Speech "restored" event.
     */
    public function restored(Speech $speech): void
    {
        $message = self::MESSAGE . $speech->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $speech);
    }

    /**
     * Handle the Speech "force deleted" event.
     */
    public function forceDeleted(Speech $speech): void
    {
        $message = self::MESSAGE . $speech->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $speech);
    }
}
