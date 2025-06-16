<?php

namespace App\Observers;

use App\Models\OrganizationProject;
use App\Services\ActivityLoggerService;

class OrganizationProjectObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación proyecto-organizacion ';

    /**
     * Handle the OrganizationProject "created" event.
     */
    public function created(OrganizationProject $organizationProject): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $organizationProject);
    }

    /**
     * Handle the OrganizationProject "updated" event.
     */
    public function updated(OrganizationProject $organizationProject): void
    {
        if ($organizationProject->wasChanged('deleted_at') && is_null($organizationProject->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $organizationProject);
    }

    /**
     * Handle the OrganizationProject "deleted" event.
     */
    public function deleted(OrganizationProject $organizationProject): void
    {
        if ($organizationProject->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $organizationProject);
    }

    /**
     * Handle the OrganizationProject "restored" event.
     */
    public function restored(OrganizationProject $organizationProject): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $organizationProject);
    }

    /**
     * Handle the OrganizationProject "force deleted" event.
     */
    public function forceDeleted(OrganizationProject $organizationProject): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $organizationProject);
    }
}
