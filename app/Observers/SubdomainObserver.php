<?php

namespace App\Observers;

use App\Models\Subdomain;
use App\Services\ActivityLoggerService;

class SubdomainObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El subdominio ';

    /**
     * Handle the Subdomain "created" event.
     */
    public function created(Subdomain $subdomain): void
    {
        $message = self::MESSAGE . $subdomain->title . ' fue creada';
        $this->activityLog->default('created', $message, $subdomain);
    }

    /**
     * Handle the Subdomain "updated" event.
     */
    public function updated(Subdomain $subdomain): void
    {
        if ($subdomain->wasChanged('deleted_at') && is_null($subdomain->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $subdomain->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $subdomain);
    }

    /**
     * Handle the Subdomain "deleted" event.
     */
    public function deleted(Subdomain $subdomain): void
    {
        if ($subdomain->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $subdomain->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $subdomain);
    }

    /**
     * Handle the Subdomain "restored" event.
     */
    public function restored(Subdomain $subdomain): void
    {
        $message = self::MESSAGE . $subdomain->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $subdomain);
    }

    /**
     * Handle the Subdomain "force deleted" event.
     */
    public function forceDeleted(Subdomain $subdomain): void
    {
        $message = self::MESSAGE . $subdomain->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $subdomain);
    }
}
