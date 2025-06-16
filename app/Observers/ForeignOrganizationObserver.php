<?php

namespace App\Observers;

use App\Models\ForeignOrganization;
use App\Services\ActivityLoggerService;

class ForeignOrganizationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La organización extranjera ';

    /**
     * Handle the ForeignOrganization "created" event.
     */
    public function created(ForeignOrganization $foreignOrganization): void
    {
        $message = self::MESSAGE . $foreignOrganization->company_name . ' fue creada';
        $this->activityLog->default('created', $message, $foreignOrganization);
    }

    /**
     * Handle the ForeignOrganization "updated" event.
     */
    public function updated(ForeignOrganization $foreignOrganization): void
    {
        if ($foreignOrganization->wasChanged('deleted_at') && is_null($foreignOrganization->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $foreignOrganization->company_name . ' fue actualizada';
        $this->activityLog->default('updated', $message, $foreignOrganization);
    }

    /**
     * Handle the ForeignOrganization "deleted" event.
     */
    public function deleted(ForeignOrganization $foreignOrganization): void
    {
        if ($foreignOrganization->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $foreignOrganization->company_name . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $foreignOrganization);
    }

    /**
     * Handle the ForeignOrganization "restored" event.
     */
    public function restored(ForeignOrganization $foreignOrganization): void
    {
        $message = self::MESSAGE . $foreignOrganization->company_name . ' fue restaurada';
        $this->activityLog->default('restored', $message, $foreignOrganization);
    }

    /**
     * Handle the ForeignOrganization "force deleted" event.
     */
    public function forceDeleted(ForeignOrganization $foreignOrganization): void
    {
        $message = self::MESSAGE . $foreignOrganization->company_name . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $foreignOrganization);
    }
}
