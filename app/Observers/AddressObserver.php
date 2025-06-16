<?php

namespace App\Observers;

use App\Models\Address;
use App\Services\ActivityLoggerService;

class AddressObserver
{
    public function __construct(
        protected ActivityLoggerService $activityLog
    ) {}

    private const MESSAGE = 'La dirección ';

    /**
     * Handle the Address "created" event.
     */
    public function created(Address $address): void
    {
        $message = self::MESSAGE . $address->id . ' fue creada';
        $this->activityLog->default('created', $message, $address);
    }

    /**
     * Handle the Address "updated" event.
     */
    public function updated(Address $address): void
    {
        if ($address->wasChanged('deleted_at') && is_null($address->deleted_at)) {
            return;
        }
        $message = self::MESSAGE . $address->id . ' fue actualizada';
        $this->activityLog->default('updated', $message, $address);
    }

    /**
     * Handle the Address "deleted" event.
     */
    public function deleted(Address $address): void
    {
        if ($address->isForceDeleting()) {
            return;
        }
        $message = self::MESSAGE . $address->id . ' fue eliminada';
        $this->activityLog->default('deleted', $message, $address);
    }

    /**
     * Handle the Address "restored" event.
     */
    public function restored(Address $address): void
    {
        $message = self::MESSAGE . $address->id . ' fue restaurada';
        $this->activityLog->default('restored', $message, $address);
    }

    /**
     * Handle the Address "force deleted" event.
     */
    public function forceDeleted(Address $address): void
    {
        $message = self::MESSAGE . $address->id . ' fue eliminada permanentemente';
        $this->activityLog->default('force_deleted', $message, $address);
    }
}
