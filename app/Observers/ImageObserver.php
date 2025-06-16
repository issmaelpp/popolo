<?php

namespace App\Observers;

use App\Models\Image;
use App\Services\ActivityLoggerService;

class ImageObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La imagen ';

    /**
     * Handle the Image "created" event.
     */
    public function created(Image $image): void
    {
        $message = self::MESSAGE . $image->title . ' fue creada';
        $this->activityLog->default('created', $message, $image);
    }

    /**
     * Handle the Image "updated" event.
     */
    public function updated(Image $image): void
    {
        if ($image->wasChanged('deleted_at') && is_null($image->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $image->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $image);
    }

    /**
     * Handle the Image "deleted" event.
     */
    public function deleted(Image $image): void
    {
        if ($image->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $image->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $image);
    }

    /**
     * Handle the Image "restored" event.
     */
    public function restored(Image $image): void
    {
        $message = self::MESSAGE . $image->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $image);
    }

    /**
     * Handle the Image "force deleted" event.
     */
    public function forceDeleted(Image $image): void
    {
        $message = self::MESSAGE . $image->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $image);
    }
}
