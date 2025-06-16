<?php

namespace App\Observers;

use App\Models\Domain;
use App\Services\ActivityLoggerService;

class DomainObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El dominio ';

    /**
     * Handle the Domain "created" event.
     */
    public function created(Domain $domain): void
    {
        $message = self::MESSAGE . $domain->title . ' fue creada';
        $this->activityLog->default('created', $message, $domain);
    }

    /**
     * Handle the Domain "updated" event.
     */
    public function updated(Domain $domain): void
    {
        if ($domain->wasChanged('deleted_at') && is_null($domain->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $domain->title . ' fue actualizada';
        $this->activityLog->default('updated', $message, $domain);
    }

    /**
     * Handle the Domain "deleted" event.
     */
    public function deleted(Domain $domain): void
    {
        if ($domain->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $domain->title . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $domain);
    }

    /**
     * Handle the Domain "restored" event.
     */
    public function restored(Domain $domain): void
    {
        $message = self::MESSAGE . $domain->title . ' fue restaurada';
        $this->activityLog->default('restored', $message, $domain);
    }

    /**
     * Handle the Domain "force deleted" event.
     */
    public function forceDeleted(Domain $domain): void
    {
        $message = self::MESSAGE . $domain->title . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $domain);
    }
}
