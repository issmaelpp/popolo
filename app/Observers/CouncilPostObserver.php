<?php

namespace App\Observers;

use App\Models\CouncilPost;
use App\Services\ActivityLoggerService;

class CouncilPostObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La publicación del concejo ';

    /**
     * Handle the CouncilPost "created" event.
     */
    public function created(CouncilPost $councilPost): void
    {
        $message = self::MESSAGE . $councilPost->title . ' fue creada';
        $this->activityLog->default('created', $message, $councilPost);
    }

    /**
     * Handle the CouncilPost "updated" event.
     */
    public function updated(CouncilPost $councilPost): void
    {
        if ($councilPost->wasChanged('deleted_at') && is_null($councilPost->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $councilPost->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $councilPost);
    }

    /**
     * Handle the CouncilPost "deleted" event.
     */
    public function deleted(CouncilPost $councilPost): void
    {
        if ($councilPost->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $councilPost->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $councilPost);
    }

    /**
     * Handle the CouncilPost "restored" event.
     */
    public function restored(CouncilPost $councilPost): void
    {
        $message = self::MESSAGE . $councilPost->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $councilPost);
    }

    /**
     * Handle the CouncilPost "force deleted" event.
     */
    public function forceDeleted(CouncilPost $councilPost): void
    {
        $message = self::MESSAGE . $councilPost->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $councilPost);
    }
}
