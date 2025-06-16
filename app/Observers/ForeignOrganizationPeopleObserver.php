<?php

namespace App\Observers;

use App\Models\ForeignOrganization;
use App\Models\ForeignOrganizationPeople;
use App\Services\ActivityLoggerService;

class ForeignOrganizationPeopleObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La relación organización_extranjera-persona';

    /**
     * Handle the ForeignOrganization "created" event.
     */
    public function created(ForeignOrganizationPeople $foreignOrganizationPeople): void
    {
        $message = self::MESSAGE . ' fue creada';
        $this->activityLog->default('created', $message, $foreignOrganizationPeople);
    }

    /**
     * Handle the ForeignOrganization "updated" event.
     */
    public function updated(ForeignOrganizationPeople $foreignOrganizationPeople): void
    {
        if ($foreignOrganizationPeople->wasChanged('deleted_at') && is_null($foreignOrganizationPeople->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . ' fue actualizada';
        $this->activityLog->default('updated', $message, $foreignOrganizationPeople);
    }

    /**
     * Handle the ForeignOrganization "deleted" event.
     */
    public function deleted(ForeignOrganizationPeople $foreignOrganizationPeople): void
    {
        if ($foreignOrganizationPeople->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $foreignOrganizationPeople);
    }

    /**
     * Handle the ForeignOrganization "restored" event.
     */
    public function restored(ForeignOrganizationPeople $foreignOrganizationPeople): void
    {
        $message = self::MESSAGE . ' fue restaurada';
        $this->activityLog->default('restored', $message, $foreignOrganizationPeople);
    }

    /**
     * Handle the ForeignOrganization "force deleted" event.
     */
    public function forceDeleted(ForeignOrganizationPeople $foreignOrganizationPeople): void
    {
        $message = self::MESSAGE . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $foreignOrganizationPeople);
    }
}
