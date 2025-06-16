<?php

namespace App\Observers;

use App\Models\Tag;
use App\Services\ActivityLoggerService;

class TagObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El tag ';

    /**
     * Handle the Tag "created" event.
     */
    public function created(Tag $tag): void
    {
        $message = self::MESSAGE . $tag->name . ' fue creada';
        $this->activityLog->default('created', $message, $tag);
    }

    /**
     * Handle the Tag "updated" event.
     */
    public function updated(Tag $tag): void
    {
        if ($tag->wasChanged('deleted_at') && is_null($tag->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $tag->name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $tag);
    }

    /**
     * Handle the Tag "deleted" event.
     */
    public function deleted(Tag $tag): void
    {
        if ($tag->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $tag->name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $tag);
    }

    /**
     * Handle the Tag "restored" event.
     */
    public function restored(Tag $tag): void
    {
        $message = self::MESSAGE . $tag->name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $tag);
    }

    /**
     * Handle the Tag "force deleted" event.
     */
    public function forceDeleted(Tag $tag): void
    {
        $message = self::MESSAGE . $tag->name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $tag);
    }
}
