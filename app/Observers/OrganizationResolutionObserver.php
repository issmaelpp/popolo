<?php

namespace App\Observers;

use App\Models\OrganizationResolution;
use App\Services\ActivityLoggerService;

class OrganizationResolutionObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación organización-resolución ';

    /**
     * Handle the OrganizationResolution "created" event.
     */
    public function created(OrganizationResolution $organizationResolution): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $organizationResolution);
    }

    /**
     * Handle the OrganizationResolution "updated" event.
     */
    public function updated(OrganizationResolution $organizationResolution): void
    {
        if ($organizationResolution->wasChanged('deleted_at') && is_null($organizationResolution->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $organizationResolution);
    }

    /**
     * Handle the OrganizationResolution "deleted" event.
     */
    public function deleted(OrganizationResolution $organizationResolution): void
    {
        if ($organizationResolution->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $organizationResolution);
    }

    /**
     * Handle the OrganizationResolution "restored" event.
     */
    public function restored(OrganizationResolution $organizationResolution): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $organizationResolution);
    }

    /**
     * Handle the OrganizationResolution "force deleted" event.
     */
    public function forceDeleted(OrganizationResolution $organizationResolution): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $organizationResolution);
    }
}
