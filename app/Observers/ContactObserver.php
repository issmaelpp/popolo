<?php

namespace App\Observers;

use App\Models\Contact;
use App\Services\ActivityLoggerService;

class ContactObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'El contacto ';

    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        $message = self::MESSAGE . $contact->id . ' fue creada';
        $this->activityLog->default('created', $message, $contact);
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        if ($contact->wasChanged('deleted_at') && is_null($contact->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $contact->id . ' fue actualizada';
        $this->activityLog->default('updated', $message, $contact);
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        if ($contact->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $contact->id . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $contact);
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        $message = self::MESSAGE . $contact->id . ' fue restaurada';
        $this->activityLog->default('restored', $message, $contact);
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        $message = self::MESSAGE . $contact->id . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $contact);
    }
}
