<?php

namespace App\Observers;

use App\Models\OrganizationPeople;
use App\Services\ActivityLoggerService;

class OrganizationPeopleObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación organización-persona ';

    /**
     * Handle the OrganizationPeople "created" event.
     */
    public function created(OrganizationPeople $organizationPeople): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $organizationPeople);
    }

    /**
     * Handle the OrganizationPeople "updated" event.
     */
    public function updated(OrganizationPeople $organizationPeople): void
    {
        if ($organizationPeople->wasChanged('deleted_at') && is_null($organizationPeople->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $organizationPeople);
    }

    /**
     * Handle the OrganizationPeople "deleted" event.
     */
    public function deleted(OrganizationPeople $organizationPeople): void
    {
        if ($organizationPeople->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $organizationPeople);
    }

    /**
     * Handle the OrganizationPeople "restored" event.
     */
    public function restored(OrganizationPeople $organizationPeople): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $organizationPeople);
    }

    /**
     * Handle the OrganizationPeople "force deleted" event.
     */
    public function forceDeleted(OrganizationPeople $organizationPeople): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $organizationPeople);
    }
}
