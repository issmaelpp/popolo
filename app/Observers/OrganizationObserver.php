<?php

namespace App\Observers;

use App\Models\Organization;
use App\Services\ActivityLoggerService;

class OrganizationObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La organización ';

    /**
     * Handle the Organization "created" event.
     */
    public function created(Organization $organization): void
    {
        $message = self::MESSAGE . $organization->full_name . ' fue creada';
        app(ActivityLoggerService::class)->general('created', $message, $organization);
    }

    /**
     * Handle the Organization "updated" event.
     */
    public function updated(Organization $organization): void
    {
        if ($organization->wasChanged('deleted_at') && is_null($organization->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $organization->full_name . ' fue actualizada';
        app(ActivityLoggerService::class)->general('updated', $message, $organization);
    }

    /**
     * Handle the Organization "deleted" event.
     */
    public function deleted(Organization $organization): void
    {
        if ($organization->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $organization->full_name . ' fue eliminada';
        app(ActivityLoggerService::class)->general('deleted', $message, $organization);
    }

    /**
     * Handle the Organization "restored" event.
     */
    public function restored(Organization $organization): void
    {
        $message = self::MESSAGE . $organization->full_name . ' fue restaurada';
        app(ActivityLoggerService::class)->general('restored', $message, $organization);
    }

    /**
     * Handle the Organization "force deleted" event.
     */
    public function forceDeleted(Organization $organization): void
    {
        $message = self::MESSAGE . $organization->full_name . ' fue eliminada permanentemente';
        app(ActivityLoggerService::class)->general('force_deleted', $message, $organization);
    }
}
