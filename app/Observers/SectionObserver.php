<?php

namespace App\Observers;

use App\Models\Section;
use App\Services\ActivityLoggerService;

class SectionObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La sección ';

    /**
     * Handle the Section "created" event.
     */
    public function created(Section $section): void
    {
        $message = self::MESSAGE . $section->title . ' fue creada';
        $this->activityLog->default('created', $message, $section);
    }

    /**
     * Handle the Section "updated" event.
     */
    public function updated(Section $section): void
    {
        if ($section->wasChanged('deleted_at') && is_null($section->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $section->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $section);
    }

    /**
     * Handle the Section "deleted" event.
     */
    public function deleted(Section $section): void
    {
        if ($section->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $section->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $section);
    }

    /**
     * Handle the Section "restored" event.
     */
    public function restored(Section $section): void
    {
        $message = self::MESSAGE . $section->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $section);
    }

    /**
     * Handle the Section "force deleted" event.
     */
    public function forceDeleted(Section $section): void
    {
        $message = self::MESSAGE . $section->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $section);
    }
}
