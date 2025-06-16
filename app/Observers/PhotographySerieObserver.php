<?php

namespace App\Observers;

use App\Models\PhotographySerie;
use App\Services\ActivityLoggerService;

class PhotographySerieObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La serie de fotografías ';

    /**
     * Handle the PhotographySerie "created" event.
     */
    public function created(PhotographySerie $photographySerie): void
    {
        $message = self::MESSAGE . $photographySerie->title . ' fue creada';
        $this->activityLog->default('created', $message, $photographySerie);
    }

    /**
     * Handle the PhotographySerie "updated" event.
     */
    public function updated(PhotographySerie $photographySerie): void
    {
        if ($photographySerie->wasChanged('deleted_at') && is_null($photographySerie->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $photographySerie->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $photographySerie);
    }

    /**
     * Handle the PhotographySerie "deleted" event.
     */
    public function deleted(PhotographySerie $photographySerie): void
    {
        if ($photographySerie->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $photographySerie->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $photographySerie);
    }

    /**
     * Handle the PhotographySerie "restored" event.
     */
    public function restored(PhotographySerie $photographySerie): void
    {
        $message = self::MESSAGE . $photographySerie->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $photographySerie);
    }

    /**
     * Handle the PhotographySerie "force deleted" event.
     */
    public function forceDeleted(PhotographySerie $photographySerie): void
    {
        $message = self::MESSAGE . $photographySerie->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $photographySerie);
    }
}
